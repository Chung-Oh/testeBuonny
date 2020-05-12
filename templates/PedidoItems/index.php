<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedidoItem[]|\Cake\Collection\CollectionInterface $pedidoItems
 */
?>
<div class="pedidoItems index content">
    <?= $this->Html->link(__('New Pedido Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pedido Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pedido_id') ?></th>
                    <th><?= $this->Paginator->sort('produto_id') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidoItems as $pedidoItem): ?>
                <tr>
                    <td><?= $this->Number->format($pedidoItem->id) ?></td>
                    <td><?= $pedidoItem->has('pedido') ? $this->Html->link($pedidoItem->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidoItem->pedido->id]) : '' ?></td>
                    <td><?= $pedidoItem->has('produto') ? $this->Html->link($pedidoItem->produto->id, ['controller' => 'Produtos', 'action' => 'view', $pedidoItem->produto->id]) : '' ?></td>
                    <td><?= $this->Number->format($pedidoItem->quantidade) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pedidoItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidoItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidoItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidoItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
