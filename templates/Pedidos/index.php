<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<div class="pedidos index content">
    <?= $this->Html->link(
        __('New Pedido'),
        ['action' => 'add'],
        [
            'class' => 'btn btn-primary btn-lg float-right font-weight-bold',
            'style' => 'font-size: 16px'
        ]
    ) ?>
    <h3><?= __('Pedidos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= __('Valor Total') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                    <td><?= $this->Number->format($pedido->valor_total) ?></td>
                    <td class="actions">
                        <button type="button" onclick="edit('/pedidos/edit/', <?php echo $pedido->id ?>)" class="btn btn-warning">Editar</button>
                        <button type="button" onclick="remove('/pedidos/delete/', <?php echo $pedido->id ?>)" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Excluir</button>
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
<!-- Modal Excluir -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= $this->Form->create($pedidos, ['action' => '/pedidos/delete/']); ?>
      <div class="modal-body">
        Deseja realmente excluir este pedido?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Não</button>
        <button type="submit" class="btn btn-primary btn-lg">Sim</button>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
