<?php

return [
    'app' => [
        'name' => 'CS362 Group 92 Compliance Report',
        'description' => 'Specification Compliance & Student Q&A Review',
        'version' => '1.0.0',
        'timezone' => 'America/Los_Angeles'
    ],
    
    'database' => [
        'type' => 'mysql',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'cs362_compliance',
        'charset' => 'utf8mb4'
    ],
    
    'routes' => [
        '/' => [
            'controller' => 'App\\Controller\\HomeController',
            'action' => 'index'
        ],
        '/compliance' => [
            'controller' => 'App\\Controller\\ComplianceController',
            'action' => 'overview'
        ],
        '/compliance/overview' => [
            'controller' => 'App\\Controller\\ComplianceController',
            'action' => 'overview'
        ],
        '/compliance/detailed' => [
            'controller' => 'App\\Controller\\ComplianceController',
            'action' => 'detailed'
        ],
        '/compliance/report' => [
            'controller' => 'App\\Controller\\ComplianceController',
            'action' => 'report'
        ],
        '/summary' => [
            'controller' => 'App\\Controller\\SummaryController',
            'action' => 'index'
        ],
        '/summary/detailed' => [
            'controller' => 'App\\Controller\\SummaryController',
            'action' => 'detailed'
        ],
        '/qa' => [
            'controller' => 'App\\Controller\\QAController',
            'action' => 'index'
        ],
        '/qa/category' => [
            'controller' => 'App\\Controller\\QAController',
            'action' => 'category'
        ],
        '/qa/search' => [
            'controller' => 'App\\Controller\\QAController',
            'action' => 'search'
        ],
        '/qa/api' => [
            'controller' => 'App\\Controller\\QAController',
            'action' => 'api'
        ],
        '/discussion' => [
            'controller' => 'App\\Controller\\DiscussionController',
            'action' => 'index'
        ],
        '/discussion/topic' => [
            'controller' => 'App\\Controller\\DiscussionController',
            'action' => 'topic'
        ]
    ],
    
    'view' => [
        'engine' => 'twig',
        'paths' => [
            'app/views'
        ]
    ]
];