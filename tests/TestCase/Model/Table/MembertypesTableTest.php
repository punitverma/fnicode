<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembertypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembertypesTable Test Case
 */
class MembertypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MembertypesTable
     */
    protected $Membertypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Membertypes',
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
        $config = TableRegistry::getTableLocator()->exists('Membertypes') ? [] : ['className' => MembertypesTable::class];
        $this->Membertypes = TableRegistry::getTableLocator()->get('Membertypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Membertypes);

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
