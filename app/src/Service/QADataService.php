<?php

namespace App\Service;

use App\Model\QAItem;

/**
 * Q&A Data Service
 * Handles loading and filtering of Q&A data
 */
class QADataService
{
    /**
     * @var array
     */
    private $qaData;

    public function __construct()
    {
        $this->loadQAData();
    }

    /**
     * Load Q&A data from configuration
     */
    private function loadQAData(): void
    {
        // This would normally come from a database or API
        // For now, we'll use the data from our TypeScript file
        $this->qaData = [
            [
                'id' => 'faq-1',
                'category' => 'General FAQ',
                'question' => 'What built-in functions can we use in our project?',
                'answer' => 'You may use the built-in functions in your `tests.py` file, NOT in `task.py`. The restriction is on functions that would directly solve the entire task for you. For example, you cannot use `int()` or `float()` to convert strings to numbers in `conv_num`, `datetime.datetime.fromtimestamp()` in `my_datetime`, or built-in byte/hex conversion functions in `conv_endian`. However, you can use helper functions like `isdigit()`, `ord()`, and bitwise operators that still require you to implement the core logic yourself.',
                'hasCode' => false
            ],
            [
                'id' => 'faq-2',
                'category' => 'General FAQ',
                'question' => 'How should we handle timezone issues with datetime?',
                'answer' => 'Some students are seeing different dates returned by the datetime module when passed a given number of seconds when working locally or remotely. This is because `datetime.datetime.fromtimestamp()` uses the local timezone. To avoid this, you want to use UTC, so `datetime.datetime.fromtimestamp(epoch_sec, tz=timezone.utc)`.',
                'hasCode' => true,
                'codeSnippet' => 'datetime.datetime.fromtimestamp(epoch_sec, tz=timezone.utc)'
            ],
            [
                'id' => 'built-ins-1',
                'category' => 'Built-ins & Functions',
                'question' => 'Can we use functions like isdigit() or ord() for the conv_num function?',
                'answer' => 'Yes, you can use functions like `isdigit()`, `ord()`, and bitwise operators. The restriction is on functions that would directly solve the entire task for you. You cannot use `int()` or `float()` to convert strings to numbers in `conv_num`, but you can use helper functions that still require you to implement the core logic yourself.',
                'hasCode' => false
            ],
            [
                'id' => 'testing-1',
                'category' => 'Testing & Validation',
                'question' => 'When running our tests, we\'re getting output like \'AssertionError: assert None == 123\'. Is this a problem?',
                'answer' => 'This is showing that your function is returning `None` when it should be returning `123`. The test expected `conv_num(\'0123\')` to return `123`, but your function returned `None` instead. This is not a linting error but an actual test failure. You need to fix your implementation to handle leading zeros correctly.',
                'hasCode' => true,
                'codeSnippet' => 'E       AssertionError: assert None == 123\nE        +  where None = conv_num(\'0123\')'
            ],
            [
                'id' => 'github-1',
                'category' => 'GitHub & Workflow',
                'question' => 'Do we need GitHub Pro for this project?',
                'answer' => 'No, you don\'t need GitHub Pro for this project. The free tier of GitHub provides all the features you need: private repositories, collaboration with your group members, CI/CD with GitHub Actions, and issue tracking. If you\'re a student, you can also sign up for the GitHub Student Developer Pack, which provides GitHub Pro for free, but it\'s not required for this assignment.',
                'hasCode' => false
            ],
            [
                'id' => 'style-1',
                'category' => 'Code Style & Documentation',
                'question' => 'Are there any restrictions on the length of our code?',
                'answer' => 'Yes, there are line length restrictions. Your code should follow PEP 8 guidelines, which recommend a maximum line length of 79 characters. However, for this project, we\'re allowing up to 127 characters per line. If you\'re using flake8 for linting, you can configure it with `--max-line-length=127` to match our grading environment.',
                'hasCode' => true,
                'codeSnippet' => 'flake8 --max-line-length=127'
            ]
        ];
    }

    /**
     * Get all Q&A items
     * @return QAItem[]
     */
    public function getAllQAItems(): array
    {
        return array_map(function($data) {
            return QAItem::fromArray($data);
        }, $this->qaData);
    }

    /**
     * Get Q&A items by category
     * @param string $category
     * @return QAItem[]
     */
    public function getQAItemsByCategory(string $category): array
    {
        $filtered = array_filter($this->qaData, function($item) use ($category) {
            return $item['category'] === $category;
        });

        return array_map(function($data) {
            return QAItem::fromArray($data);
        }, $filtered);
    }

    /**
     * Get all categories
     * @return array
     */
    public function getCategories(): array
    {
        return QAItem::getCategories();
    }

    /**
     * Search Q&A items
     * @param string $query
     * @return QAItem[]
     */
    public function searchQAItems(string $query): array
    {
        $query = strtolower($query);
        
        $filtered = array_filter($this->qaData, function($item) use ($query) {
            return strpos(strtolower($item['question']), $query) !== false ||
                   strpos(strtolower($item['answer']), $query) !== false;
        });

        return array_map(function($data) {
            return QAItem::fromArray($data);
        }, $filtered);
    }
}