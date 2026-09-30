<?php
/**
 * Agent SEO Planner Processor
 */

namespace Controllers\Agent;

use Models\SEO;
use Models\AgentToken;
use Helpers\EventDispatcher;

class AgentSEOProcessor {
    public function process($action, $scopes, $agent, $input) {
        $hasRead = in_array('admin', $scopes) || in_array('seo:read', $scopes);
        $hasWrite = in_array('admin', $scopes) || in_array('seo:write', $scopes);
        $authorId = $agent['default_author_id'] ?? $agent['user_id'] ?? 1;

        switch ($action) {
            case 'seo':
                if (!$hasRead) $this->forbidden('Missing scope [seo:read]');
                $clusters = SEO::getClusters();
                $keywords = SEO::getKeywords();
                
                $db = \Database::getInstance();
                $targets = [
                    'organic_sessions' => (float)getSetting('kpi_organic_sessions_target', 0),
                    'impressions' => (float)getSetting('kpi_impressions_target', 0),
                    'position' => (float)getSetting('kpi_position_target', 0),
                    'ctr' => (float)getSetting('kpi_ctr_target', 0)
                ];

                // Fetch actual Google report data (28 days) and local server hits
                $report = analyticsDashboardData(28);
                $ga = $report['ga']['summary'] ?? [];
                $gsc = $report['gsc']['summary'] ?? [];
                
                $stmtViews = $db->query("SELECT COUNT(*) FROM page_views");
                $localViews = (int)$stmtViews->fetchColumn();

                $actual = [
                    'organic_sessions' => (float)($ga['sessions'] ?? 0),
                    'impressions' => (float)($gsc['impressions'] ?? 0),
                    'position' => (float)($gsc['position'] ?? 0),
                    'ctr' => (float)($gsc['ctr'] ?? 0),
                    'engagement_rate' => (float)($ga['engagementRate'] ?? 0),
                    'avg_engagement_time' => (float)($ga['averageEngagementTimePerSession'] ?? 0),
                    'leads' => (float)($report['ga']['events']['generate_lead'] ?? 0),
                    'local_page_views' => $localViews
                ];

                $this->success([
                    'clusters' => $clusters,
                    'keywords' => $keywords,
                    'targets' => $targets,
                    'actual' => $actual
                ]);
                break;

            case 'create_keyword':
                if (!$hasWrite) $this->forbidden('Missing scope [seo:write]');
                $month = trim($input['planning_month'] ?? '');
                $kw = trim($input['keyword'] ?? '');
                if ($month === '' || $kw === '') {
                    $this->error('Missing required fields: planning_month, keyword');
                }

                // Check existing
                if (SEO::findKeywordByVal($month, $kw)) {
                    $this->error('Conflict: Keyword already exists in this planning month.');
                }

                $data = [
                    'planning_month' => $month,
                    'keyword' => $kw,
                    'intent' => $input['intent'] ?? 'informational',
                    'target_url' => $input['target_url'] ?? null,
                    'cluster_id' => isset($input['cluster_id']) ? (int)$input['cluster_id'] : null,
                    'content_role' => $input['content_role'] ?? 'satellite',
                    'priority' => $input['priority'] ?? 'medium',
                    'status' => 'idea',
                    'notes' => $input['notes'] ?? null
                ];

                SEO::createKeyword($data);
                AgentToken::logAudit($authorId, 'agent_create_keyword', 'seo_keyword_map', null, [], ['keyword' => $kw, 'month' => $month]);

                // Dispatch event for auto SERP research task creation
                EventDispatcher::dispatch('keyword_created', [
                    'keyword' => $kw,
                    'planning_month' => $month,
                    'intent' => $data['intent'],
                    'priority' => $data['priority']
                ]);

                $this->success(['keyword' => $kw, 'planning_month' => $month, 'status' => 'idea'], 'Keyword created successfully.');
                break;

            case 'update_keyword':
                if (!$hasWrite) $this->forbidden('Missing scope [seo:write]');
                $id = (int)($input['id'] ?? 0);
                $keywordRow = SEO::findKeywordById($id);
                if (!$keywordRow) $this->error('Keyword not found.', 404);

                $fields = [];
                if (isset($input['status'])) $fields['status'] = $input['status'];
                if (isset($input['target_url'])) $fields['target_url'] = trim($input['target_url']);
                if (isset($input['priority'])) $fields['priority'] = $input['priority'];

                if (empty($fields)) $this->error('No fields to update.');

                SEO::updateKeyword($id, $fields);
                $updatedKw = SEO::findKeywordById($id);
                AgentToken::logAudit($authorId, 'agent_update_keyword', 'seo_keyword_map', $id, $keywordRow, $updatedKw);
                $this->success($updatedKw, 'Keyword updated successfully.');
                break;

            case 'delete_keyword':
                if (!$hasWrite) $this->forbidden('Missing scope [seo:write]');
                $id = (int)($input['id'] ?? 0);
                $keywordRow = SEO::findKeywordById($id);
                if (!$keywordRow) $this->error('Keyword not found.', 404);

                SEO::deleteKeyword($id);
                AgentToken::logAudit($authorId, 'agent_delete_keyword', 'seo_keyword_map', $id, $keywordRow, ['deleted' => true, 'keyword' => $keywordRow['keyword']]);
                $this->success(['id' => $id], 'Keyword deleted successfully.');
                break;
        }
    }

    private function success($data, $message = '') {
        $resp = ['success' => true, 'data' => $data];
        if ($message) $resp['message'] = $message;
        echo json_encode($resp, JSON_UNESCAPED_UNICODE);
        exit;
    }

    private function error($msg, $code = 400) {
        http_response_code($code);
        echo json_encode(['success' => false, 'error' => $msg], JSON_UNESCAPED_UNICODE);
        exit;
    }

    private function forbidden($msg) {
        $this->error("Forbidden: " . $msg, 403);
    }
}
