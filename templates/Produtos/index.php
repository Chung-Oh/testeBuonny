<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<div class="produtos index content">
    <?= $this->Html->link(
        __('New Produto'),
        ['action' => 'add'],
        [
            'class' => 'btn btn-primary btn-lg float-right font-weight-bold',
            'style' => 'font-size: 16px'
        ]
    ) ?>
    <h3><?= __('Produtos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('preco') ?></th>
                    <th><?= __('Qtd') ?></th>
                    <th><?= __('Valor Total') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $this->Number->format($produto->id) ?></td>
                    <td><?= h($produto->descricao) ?></td>
                    <td><?= $this->Number->format($produto->preco) ?></td>
                    <td><?= $this->Number->format($produto->preco) ?></td>
                    <td><?= $this->Number->format($produto->preco) ?></td>
                    <td class="actions">
                        <button type="button" onclick="edit('/produtos/edit/', <?php echo $produto->id ?>)" class="btn btn-warning">Editar</button>
                        <button type="button" onclick="remove('/produtos/delete/', <?php echo $produto->id ?>)" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Excluir</button>
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
      <?= $this->Form->create($produtos, ['action' => '/produtos/delete/']); ?>
      <div class="modal-body">
        Deseja realmente excluir este produto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Não</button>
        <button type="submit" class="btn btn-primary btn-lg">Sim</button>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
