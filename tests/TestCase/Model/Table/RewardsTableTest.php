<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RewardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RewardsTable Test Case
 */
class RewardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RewardsTable
     */
    protected $Rewards;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rewards',
        'app.Rewardwinner',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rewards') ? [] : ['className' => RewardsTable::class];
        $this->Rewards = TableRegistry::getTableLocator()->get('Rewards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rewards);

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
