<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicedetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicedetailsTable Test Case
 */
class InvoicedetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoicedetailsTable
     */
    protected $Invoicedetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Invoicedetails',
        'app.Invoices',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Invoicedetails') ? [] : ['className' => InvoicedetailsTable::class];
        $this->Invoicedetails = TableRegistry::getTableLocator()->get('Invoicedetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Invoicedetails);

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
