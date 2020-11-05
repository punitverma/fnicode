<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrenchiecommsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrenchiecommsTable Test Case
 */
class FrenchiecommsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrenchiecommsTable
     */
    protected $Frenchiecomms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Frenchiecomms',
        'app.Frenchies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frenchiecomms') ? [] : ['className' => FrenchiecommsTable::class];
        $this->Frenchiecomms = TableRegistry::getTableLocator()->get('Frenchiecomms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Frenchiecomms);

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
