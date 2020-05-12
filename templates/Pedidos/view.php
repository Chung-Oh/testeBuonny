<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedidos view content">
            <h3><?= h($pedido->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pedido Items') ?></h4>
                <?php if (!empty($pedido->pedido_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pedido Id') ?></th>
                            <th><?= __('Produto Id') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pedido->pedido_items as $pedidoItems) : ?>
                        <tr>
                            <td><?= h($pedidoItems->id) ?></td>
                            <td><?= h($pedidoItems->pedido_id) ?></td>
                            <td><?= h($pedidoItems->produto_id) ?></td>
                            <td><?= h($pedidoItems->quantidade) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PedidoItems', 'action' => 'view', $pedidoItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PedidoItems', 'action' => 'edit', $pedidoItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidoItems', 'action' => 'delete', $pedidoItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItems->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
