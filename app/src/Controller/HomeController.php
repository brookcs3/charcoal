<?php

namespace App\Controller;

use App\Model\ComplianceReport;

/**
 * Home Controller
 * Handles the main dashboard page
 */
class HomeController
{
    /**
     * @var ComplianceReport
     */
    private $complianceReport;

    public function __construct()
    {
        $this->complianceReport = new ComplianceReport();
    }

    /**
     * Display the main dashboard
     * @return array View data
     */
    public function index(): array
    {
        return [
            'title' => 'CS362 Group 92 Project Report',
            'subtitle' => 'Specification Compliance & Student Q&A Review',
            'complianceReport' => $this->complianceReport,
            'heroStats' => $this->getHeroStats(),
            'quickLinks' => $this->getQuickLinks()
        ];
    }

    /**
     * Get hero section statistics
     * @return array
     */
    private function getHeroStats(): array
    {
        return [
            [
                'label' => 'Overall Score',
                'value' => $this->complianceReport->getComplianceScore() . '%',
                'icon' => '📊',
                'status' => 'success'
            ],
            [
                'label' => 'Tests Passed',
                'value' => $this->complianceReport->getMetrics()['tests_passed'] . '/' . $this->complianceReport->getMetrics()['tests_total'],
                'icon' => '✅',
                'status' => 'success'
            ],
            [
                'label' => 'Code Coverage',
                'value' => $this->complianceReport->getMetrics()['code_coverage'] . '%',
                'icon' => '🔧',
                'status' => 'warning'
            ],
            [
                'label' => 'Documentation',
                'value' => $this->complianceReport->getMetrics()['documentation_score'] . '%',
                'icon' => '📋',
                'status' => 'success'
            ]
        ];
    }

    /**
     * Get quick navigation links
     * @return array
     */
    private function getQuickLinks(): array
    {
        return [
            [
                'title' => 'Compliance Analysis',
                'description' => 'Detailed breakdown of compliance metrics',
                'url' => '/compliance',
                'icon' => '📊'
            ],
            [
                'title' => 'Summary Report',
                'description' => 'Executive summary of project status',
                'url' => '/summary',
                'icon' => '📋'
            ],
            [
                'title' => 'Q&A Section',
                'description' => 'Common questions and guidelines',
                'url' => '/qa',
                'icon' => '❓'
            ],
            [
                'title' => 'Ed Discussions',
                'description' => 'Course discussion board insights',
                'url' => '/discussion',
                'icon' => '💬'
            ]
        ];
    }
}