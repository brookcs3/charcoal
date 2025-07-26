<?php

use PHPUnit\Framework\TestCase;
use App\Service\QADataService;
use App\Model\QAItem;

class QADataServiceTest extends TestCase
{
    public function testSearchReturnsResults()
    {
        $service = new QADataService();
        $results = $service->searchQAItems('datetime');
        $this->assertNotEmpty($results);
        $this->assertInstanceOf(QAItem::class, $results[0]);
    }

    public function testCategoriesIncludeGeneralFAQ()
    {
        $service = new QADataService();
        $this->assertContains('General FAQ', $service->getCategories());
    }
}
