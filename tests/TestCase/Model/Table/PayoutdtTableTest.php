<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayoutdtTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayoutdtTable Test Case
 */
class PayoutdtTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PayoutdtTable
     */
    protected $Payoutdt;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Payoutdt',
        'app.Payout',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Payoutdt') ? [] : ['className' => PayoutdtTable::class];
        $this->Payoutdt = TableRegistry::getTableLocator()->get('Payoutdt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Payoutdt);

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
