<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Tablelocks;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Tablelocks Test Case
 */
class TablelocksTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\Tablelocks
     */
    protected $Tablelocks;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('locks') ? [] : ['className' => Tablelocks::class];
        $this->Tablelocks = TableRegistry::getTableLocator()->get('locks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tablelocks);

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
