<?php

namespace App\Controller;

use App\Service\QADataService;
use Charcoal\App\Controller\AbstractController;

class QAController extends AbstractController
{
    private $qaService;

    public function __construct()
    {
        parent::__construct();
        $this->qaService = new QADataService();
    }

    public function index()
    {
        $allQAs = $this->qaService->getAllQAs();
        $categories = $this->qaService->getCategories();
        
        return $this->render('qa/index.twig', [
            'qas' => $allQAs,
            'categories' => $categories,
            'title' => 'Q&A Section - CS362 Analysis'
        ]);
    }

    public function category($category = null)
    {
        if (!$category) {
            return $this->redirect('/qa');
        }

        $filteredQAs = $this->qaService->getQAsByCategory($category);
        $categories = $this->qaService->getCategories();
        
        return $this->render('qa/category.twig', [
            'qas' => $filteredQAs,
            'categories' => $categories,
            'currentCategory' => $category,
            'title' => ucfirst($category) . ' Q&A - CS362 Analysis'
        ]);
    }

    public function search()
    {
        $query = $_GET['q'] ?? '';
        $results = [];
        
        if (!empty($query)) {
            $results = $this->qaService->searchQAs($query);
        }
        
        return $this->render('qa/search.twig', [
            'query' => $query,
            'results' => $results,
            'title' => 'Search Results - Q&A'
        ]);
    }

    public function api()
    {
        header('Content-Type: application/json');
        
        $category = $_GET['category'] ?? null;
        $search = $_GET['search'] ?? null;
        
        if ($search) {
            $data = $this->qaService->searchQAs($search);
        } elseif ($category) {
            $data = $this->qaService->getQAsByCategory($category);
        } else {
            $data = $this->qaService->getAllQAs();
        }
        
        echo json_encode([
            'success' => true,
            'data' => array_map(function($qa) {
                return $qa->toArray();
            }, $data),
            'count' => count($data)
        ]);
        exit;
    }
}