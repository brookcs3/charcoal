<?php

namespace App\Controller;

class DiscussionController
{
    /**
     * Redirects to a given URL.
     *
     * @param string $url
     * @return void
     */
    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    public function index()
    {
        $discussions = $this->getDiscussionData();
        
        return [
            'discussions' => $discussions,
            'title' => 'EdDiscussion - CS362 Analysis'
        ];
    }

    public function topic($topicId = null)
    {
        if (!$topicId) {
            return $this->redirect('/discussion');
        }

        $discussions = $this->getDiscussionData();
        $topic = null;
        
        foreach ($discussions as $discussion) {
            if ($discussion['id'] == $topicId) {
                $topic = $discussion;
                break;
            }
        }
        
        if (!$topic) {
            return $this->redirect('/discussion');
        }
        
        return [
            'topic' => $topic,
            'title' => $topic['title'] . ' - EdDiscussion'
        ];
    }

    private function getDiscussionData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Code Quality Standards',
                'category' => 'Best Practices',
                'author' => 'Development Team',
                'date' => '2024-01-15',
                'replies' => 12,
                'views' => 156,
                'status' => 'active',
                'excerpt' => 'Discussion about implementing and maintaining code quality standards across the CS362 project.',
                'content' => 'This discussion focuses on establishing consistent code quality standards for our CS362 project. We need to address several key areas including naming conventions, documentation requirements, and testing protocols. The goal is to ensure all team members follow the same standards for maintainable, readable code.',
                'tags' => ['code-quality', 'standards', 'best-practices'],
                'responses' => [
                    [
                        'author' => 'Senior Developer',
                        'date' => '2024-01-16',
                        'content' => 'Great initiative! I suggest we start with establishing clear naming conventions for variables, functions, and classes.',
                        'votes' => 8
                    ],
                    [
                        'author' => 'QA Engineer',
                        'date' => '2024-01-17',
                        'content' => 'We should also define minimum test coverage requirements and documentation standards.',
                        'votes' => 6
                    ]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Performance Optimization Strategies',
                'category' => 'Performance',
                'author' => 'Tech Lead',
                'date' => '2024-01-14',
                'replies' => 8,
                'views' => 89,
                'status' => 'active',
                'excerpt' => 'Exploring various approaches to optimize application performance and reduce resource consumption.',
                'content' => 'Our performance analysis has identified several bottlenecks in the current implementation. This discussion aims to gather ideas and strategies for optimization, including database query optimization, caching strategies, and code refactoring opportunities.',
                'tags' => ['performance', 'optimization', 'efficiency'],
                'responses' => [
                    [
                        'author' => 'Backend Developer',
                        'date' => '2024-01-15',
                        'content' => 'Database query optimization should be our first priority. I\'ve identified several N+1 query problems.',
                        'votes' => 5
                    ]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Security Best Practices',
                'category' => 'Security',
                'author' => 'Security Team',
                'date' => '2024-01-13',
                'replies' => 15,
                'views' => 203,
                'status' => 'resolved',
                'excerpt' => 'Comprehensive review of security measures and implementation of best practices.',
                'content' => 'Following our security audit, we need to implement several security improvements. This includes input validation, authentication mechanisms, and data encryption standards. All team members should review and implement these practices.',
                'tags' => ['security', 'validation', 'encryption'],
                'responses' => [
                    [
                        'author' => 'Frontend Developer',
                        'date' => '2024-01-14',
                        'content' => 'Implemented input validation on all user forms. CSRF protection is now active.',
                        'votes' => 10
                    ],
                    [
                        'author' => 'DevOps Engineer',
                        'date' => '2024-01-15',
                        'content' => 'Updated server configurations and implemented rate limiting.',
                        'votes' => 7
                    ]
                ]
            ],
            [
                'id' => 4,
                'title' => 'Testing Strategy Discussion',
                'category' => 'Testing',
                'author' => 'QA Lead',
                'date' => '2024-01-12',
                'replies' => 6,
                'views' => 67,
                'status' => 'active',
                'excerpt' => 'Defining comprehensive testing strategies including unit, integration, and end-to-end tests.',
                'content' => 'We need to establish a robust testing framework that covers all aspects of our application. This includes unit tests for individual components, integration tests for system interactions, and end-to-end tests for user workflows.',
                'tags' => ['testing', 'quality-assurance', 'automation'],
                'responses' => [
                    [
                        'author' => 'Test Engineer',
                        'date' => '2024-01-13',
                        'content' => 'Proposed test pyramid structure with 70% unit tests, 20% integration tests, and 10% E2E tests.',
                        'votes' => 4
                    ]
                ]
            ]
        ];
    }
}