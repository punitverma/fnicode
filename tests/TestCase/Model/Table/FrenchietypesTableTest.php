<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrenchietypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrenchietypesTable Test Case
 */
class FrenchietypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrenchietypesTable
     */
    protected $Frenchietypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Frenchietypes',
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
        $config = TableRegistry::getTableLocator()->exists('Frenchietypes') ? [] : ['className' => FrenchietypesTable::class];
        $this->Frenchietypes = TableRegistry::getTableLocator()->get('Frenchietypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Frenchietypes);

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
