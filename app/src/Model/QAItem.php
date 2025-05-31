<?php

namespace App\Model;

/**
 * Q&A Item Model
 * Handles individual questions and answers from Ed Discussion
 */
class QAItem
{
    /**
     * @var string
     */
    private $id;
    
    /**
     * @var string
     */
    private $category;
    
    /**
     * @var string
     */
    private $question;
    
    /**
     * @var string
     */
    private $answer;
    
    /**
     * @var bool
     */
    private $hasCode;
    
    /**
     * @var string|null
     */
    private $codeSnippet;

    /**
     * Get the ID
     * @return string
     */
    public function getId(): string
    {
        return $this->id ?? '';
    }

    /**
     * Set the ID
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the category
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category ?? '';
    }

    /**
     * Set the category
     * @param string $category
     * @return self
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get the question
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question ?? '';
    }

    /**
     * Set the question
     * @param string $question
     * @return self
     */
    public function setQuestion(string $question): self
    {
        $this->question = $question;
        return $this;
    }

    /**
     * Get the answer
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer ?? '';
    }

    /**
     * Set the answer
     * @param string $answer
     * @return self
     */
    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * Check if has code
     * @return bool
     */
    public function hasCode(): bool
    {
        return $this->hasCode ?? false;
    }

    /**
     * Set has code flag
     * @param bool $hasCode
     * @return self
     */
    public function setHasCode(bool $hasCode): self
    {
        $this->hasCode = $hasCode;
        return $this;
    }

    /**
     * Get code snippet
     * @return string|null
     */
    public function getCodeSnippet(): ?string
    {
        return $this->codeSnippet;
    }

    /**
     * Set code snippet
     * @param string|null $codeSnippet
     * @return self
     */
    public function setCodeSnippet(?string $codeSnippet): self
    {
        $this->codeSnippet = $codeSnippet;
        return $this;
    }

    /**
     * Get all available categories
     * @return array
     */
    public static function getCategories(): array
    {
        return [
            'General FAQ',
            'Built-ins & Functions',
            'Testing & Validation',
            'GitHub & Workflow',
            'Code Style & Documentation'
        ];
    }

    /**
     * Create QA item from array data
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $item = new self();
        
        if (isset($data['id'])) {
            $item->setId($data['id']);
        }
        if (isset($data['category'])) {
            $item->setCategory($data['category']);
        }
        if (isset($data['question'])) {
            $item->setQuestion($data['question']);
        }
        if (isset($data['answer'])) {
            $item->setAnswer($data['answer']);
        }
        if (isset($data['hasCode'])) {
            $item->setHasCode($data['hasCode']);
        }
        if (isset($data['codeSnippet'])) {
            $item->setCodeSnippet($data['codeSnippet']);
        }
        
        return $item;
    }

    /**
     * Convert to array
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'category' => $this->getCategory(),
            'question' => $this->getQuestion(),
            'answer' => $this->getAnswer(),
            'hasCode' => $this->hasCode(),
            'codeSnippet' => $this->getCodeSnippet()
        ];
    }
}