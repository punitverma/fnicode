<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmssTable Test Case
 */
class SmssTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SmssTable
     */
    protected $Smss;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Smss',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Smss') ? [] : ['className' => SmssTable::class];
        $this->Smss = TableRegistry::getTableLocator()->get('Smss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Smss);

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
