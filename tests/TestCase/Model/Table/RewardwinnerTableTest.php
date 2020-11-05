<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RewardwinnerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RewardwinnerTable Test Case
 */
class RewardwinnerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RewardwinnerTable
     */
    protected $Rewardwinner;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rewardwinner',
        'app.Rewards',
        'app.Members',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rewardwinner') ? [] : ['className' => RewardwinnerTable::class];
        $this->Rewardwinner = TableRegistry::getTableLocator()->get('Rewardwinner', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rewardwinner);

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
