<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesTable Test Case
 */
class InvoicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoicesTable
     */
    protected $Invoices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Invoices',
        'app.Offers',
        'app.Frenchietranscations',
        'app.Invoicedetails',
        'app.Transcations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Invoices') ? [] : ['className' => InvoicesTable::class];
        $this->Invoices = TableRegistry::getTableLocator()->get('Invoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Invoices);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
