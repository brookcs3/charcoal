<?php

namespace App\Model;

/**
 * Compliance Report Model
 * Handles compliance analysis data and metrics
 */
class ComplianceReport
{
    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $status;
    
    /**
     * @var float
     */
    private $complianceScore;
    
    /**
     * @var array
     */
    private $metrics;
    
    /**
     * @var string
     */
    private $lastUpdated;

    /**
     * Get the title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?? 'CS362 Group 92 Compliance Analysis';
    }

    /**
     * Set the title
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the status
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status ?? 'Compliant';
    }

    /**
     * Set the status
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the compliance score
     * @return float
     */
    public function getComplianceScore(): float
    {
        return $this->complianceScore ?? 94.7;
    }

    /**
     * Set the compliance score
     * @param float $score
     * @return self
     */
    public function setComplianceScore(float $score): self
    {
        $this->complianceScore = $score;
        return $this;
    }

    /**
     * Get metrics
     * @return array
     */
    public function getMetrics(): array
    {
        return $this->metrics ?? [
            'tests_passed' => 127,
            'tests_total' => 134,
            'code_coverage' => 89.3,
            'style_compliance' => 98.2,
            'documentation_score' => 92.1
        ];
    }

    /**
     * Set metrics
     * @param array $metrics
     * @return self
     */
    public function setMetrics(array $metrics): self
    {
        $this->metrics = $metrics;
        return $this;
    }

    /**
     * Get last updated timestamp
     * @return string
     */
    public function getLastUpdated(): string
    {
        return $this->lastUpdated ?? date('Y-m-d H:i:s');
    }

    /**
     * Set last updated timestamp
     * @param string $timestamp
     * @return self
     */
    public function setLastUpdated(string $timestamp): self
    {
        $this->lastUpdated = $timestamp;
        return $this;
    }

    /**
     * Get summary table data
     * @return array
     */
    public function getSummaryData(): array
    {
        return [
            [
                'component' => 'Function Implementation',
                'status' => 'Compliant',
                'score' => '96.2%',
                'details' => 'All functions properly implemented with edge case handling'
            ],
            [
                'component' => 'Test Coverage',
                'status' => 'Compliant',
                'score' => '89.3%',
                'details' => 'Comprehensive test suite covering main and edge cases'
            ],
            [
                'component' => 'Code Style',
                'status' => 'Compliant',
                'score' => '98.2%',
                'details' => 'Follows PEP 8 guidelines with proper documentation'
            ],
            [
                'component' => 'GitHub Workflow',
                'status' => 'Compliant',
                'score' => '100%',
                'details' => 'Proper branching, PRs, and collaboration practices'
            ],
            [
                'component' => 'Documentation',
                'status' => 'Compliant',
                'score' => '92.1%',
                'details' => 'Clear docstrings and comprehensive README'
            ]
        ];
    }
}