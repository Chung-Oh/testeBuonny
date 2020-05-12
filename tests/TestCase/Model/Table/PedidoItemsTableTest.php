<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidoItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidoItemsTable Test Case
 */
class PedidoItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidoItemsTable
     */
    protected $PedidoItems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PedidoItems',
        'app.Pedidos',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PedidoItems') ? [] : ['className' => PedidoItemsTable::class];
        $this->PedidoItems = TableRegistry::getTableLocator()->get('PedidoItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PedidoItems);

        parent::tearDown();
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
