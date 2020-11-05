<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentmodeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentmodeTable Test Case
 */
class PaymentmodeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentmodeTable
     */
    protected $Paymentmode;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Paymentmode',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Paymentmode') ? [] : ['className' => PaymentmodeTable::class];
        $this->Paymentmode = TableRegistry::getTableLocator()->get('Paymentmode', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Paymentmode);

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
}
