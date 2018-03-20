<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MyCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MyCategoriesTable Test Case
 */
class MyCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MyCategoriesTable
     */
    public $MyCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.my_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MyCategories') ? [] : ['className' => MyCategoriesTable::class];
        $this->MyCategories = TableRegistry::get('MyCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MyCategories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
