<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CopsTable Test Case
 */
class CopsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CopsTable
     */
    public $Cops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cops',
        'app.stations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cops') ? [] : ['className' => 'App\Model\Table\CopsTable'];
        $this->Cops = TableRegistry::get('Cops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cops);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
