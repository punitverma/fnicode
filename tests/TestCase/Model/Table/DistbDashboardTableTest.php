<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistbDashboardTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistbDashboardTable Test Case
 */
class DistbDashboardTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistbDashboardTable
     */
    protected $DistbDashboard;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DistbDashboard',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DistbDashboard') ? [] : ['className' => DistbDashboardTable::class];
        $this->DistbDashboard = TableRegistry::getTableLocator()->get('DistbDashboard', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DistbDashboard);

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
