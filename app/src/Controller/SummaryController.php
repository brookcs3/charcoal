<?php

namespace App\Controller;

class SummaryController
{
    public function index()
    {
        $summaryData = [
            'overview' => [
                'totalFiles' => 47,
                'linesOfCode' => 3247,
                'testCoverage' => 94.2,
                'cyclomatic' => 12.8,
                'maintainability' => 85.6
            ],
            'metrics' => [
                [
                    'category' => 'Code Quality',
                    'current' => 92,
                    'target' => 90,
                    'status' => 'Above Target',
                    'trend' => 'up',
                    'details' => 'Consistent improvement in code quality metrics'
                ],
                [
                    'category' => 'Test Coverage',
                    'current' => 94.2,
                    'target' => 95,
                    'status' => 'Near Target',
                    'trend' => 'up',
                    'details' => 'Excellent test coverage with room for minor improvement'
                ],
                [
                    'category' => 'Performance',
                    'current' => 78,
                    'target' => 85,
                    'status' => 'Below Target',
                    'trend' => 'stable',
                    'details' => 'Performance optimizations needed in several modules'
                ],
                [
                    'category' => 'Security',
                    'current' => 85,
                    'target' => 90,
                    'status' => 'Below Target',
                    'trend' => 'up',
                    'details' => 'Security measures improving but require attention'
                ],
                [
                    'category' => 'Documentation',
                    'current' => 95,
                    'target' => 90,
                    'status' => 'Above Target',
                    'trend' => 'up',
                    'details' => 'Comprehensive documentation exceeds expectations'
                ]
            ],
            'breakdown' => [
                'Files by Type' => [
                    'Controllers' => 8,
                    'Models' => 12,
                    'Views' => 15,
                    'Services' => 7,
                    'Tests' => 5
                ],
                'Issues by Severity' => [
                    'Critical' => 3,
                    'High' => 8,
                    'Medium' => 12,
                    'Low' => 23,
                    'Info' => 15
                ]
            ]
        ];

        return [
            'summary' => $summaryData,
            'title' => 'Project Summary - CS362 Analysis'
        ];
    }

    public function detailed()
    {
        $detailedSummary = [
            'modules' => [
                [
                    'name' => 'Authentication Module',
                    'files' => 8,
                    'lines' => 567,
                    'coverage' => 96.5,
                    'issues' => 2,
                    'status' => 'Excellent'
                ],
                [
                    'name' => 'Data Processing',
                    'files' => 12,
                    'lines' => 1023,
                    'coverage' => 89.2,
                    'issues' => 7,
                    'status' => 'Good'
                ],
                [
                    'name' => 'User Interface',
                    'files' => 15,
                    'lines' => 892,
                    'coverage' => 92.1,
                    'issues' => 5,
                    'status' => 'Good'
                ],
                [
                    'name' => 'API Endpoints',
                    'files' => 9,
                    'lines' => 634,
                    'coverage' => 98.7,
                    'issues' => 1,
                    'status' => 'Excellent'
                ],
                [
                    'name' => 'Utilities',
                    'files' => 3,
                    'lines' => 131,
                    'coverage' => 100,
                    'issues' => 0,
                    'status' => 'Perfect'
                ]
            ],
            'trends' => [
                'lastWeek' => ['quality' => 89, 'coverage' => 92.1, 'issues' => 18],
                'thisWeek' => ['quality' => 92, 'coverage' => 94.2, 'issues' => 15],
                'improvement' => ['quality' => 3, 'coverage' => 2.1, 'issues' => -3]
            ]
        ];

        return [
            'detailed' => $detailedSummary,
            'title' => 'Detailed Summary Analysis'
        ];
    }
}