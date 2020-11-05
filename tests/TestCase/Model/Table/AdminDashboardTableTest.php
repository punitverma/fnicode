<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmindashboardTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmindashboardTable Test Case
 */
class AdmindashboardTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmindashboardTable
     */
    protected $Admindashboard;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Admindashboard',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Admindashboard') ? [] : ['className' => AdmindashboardTable::class];
        $this->Admindashboard = TableRegistry::getTableLocator()->get('Admindashboard', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Admindashboard);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
