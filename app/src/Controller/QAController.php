<?php

namespace App\Controller;

use App\Service\QADataService;
class QAController
{
    private $qaService;

    public function __construct()
    {
        $this->qaService = new QADataService();
    }

    public function index()
    {
        $allQAs = $this->qaService->getAllQAItems();
        $categories = $this->qaService->getCategories();
        
        return [
            'qas' => $allQAs,
            'categories' => $categories,
            'title' => 'Q&A Section - CS362 Analysis'
        ];
    }

    public function category($category = null)
    {
        if (!$category) {
            header('Location: /qa');
            exit;
        }

        $filteredQAs = $this->qaService->getQAItemsByCategory($category);
        $categories = $this->qaService->getCategories();
        
        return [
            'qas' => $filteredQAs,
            'categories' => $categories,
            'currentCategory' => $category,
            'title' => ucfirst($category) . ' Q&A - CS362 Analysis'
        ];
    }

    public function search()
    {
        $query = $_GET['q'] ?? '';
        $results = [];
        
        if (!empty($query)) {
            $results = $this->qaService->searchQAItems($query);
        }
        
        return [
            'query' => $query,
            'results' => $results,
            'title' => 'Search Results - Q&A'
        ];
    }

    public function api()
    {
        header('Content-Type: application/json');
        
        $category = $_GET['category'] ?? null;
        $search = $_GET['search'] ?? null;
        
        if ($search) {
            $data = $this->qaService->searchQAItems($search);
        } elseif ($category) {
            $data = $this->qaService->getQAItemsByCategory($category);
        } else {
            $data = $this->qaService->getAllQAItems();
        }
        
        echo json_encode([
            'data' => array_map(function($qa) { return $qa->toArray(); }, $data),
            'count' => count($data)
        ]);
        exit;
    }
}


