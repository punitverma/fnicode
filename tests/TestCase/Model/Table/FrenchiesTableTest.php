<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrenchiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrenchiesTable Test Case
 */
class FrenchiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrenchiesTable
     */
    protected $Frenchies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Frenchies',
        'app.Frenchietypes',
        'app.States',
        'app.Districts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frenchies') ? [] : ['className' => FrenchiesTable::class];
        $this->Frenchies = TableRegistry::getTableLocator()->get('Frenchies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Frenchies);

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
