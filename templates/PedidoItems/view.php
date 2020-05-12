<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedidoItem $pedidoItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pedido Item'), ['action' => 'edit', $pedidoItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido Item'), ['action' => 'delete', $pedidoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pedido Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pedido Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedidoItems view content">
            <h3><?= h($pedidoItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pedido') ?></th>
                    <td><?= $pedidoItem->has('pedido') ? $this->Html->link($pedidoItem->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidoItem->pedido->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Produto') ?></th>
                    <td><?= $pedidoItem->has('produto') ? $this->Html->link($pedidoItem->produto->id, ['controller' => 'Produtos', 'action' => 'view', $pedidoItem->produto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pedidoItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($pedidoItem->quantidade) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
