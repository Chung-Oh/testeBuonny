<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="pedidos form content">
            <?= $this->Form->create($pedido) ?>
            <fieldset>
                <legend><?= __('Edit Pedido') ?></legend>
                <?php
                    echo $this->Form->control(
                        'cliente_id',
                        [
                            'options' => $clientes,
                            'class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6',
                            'style' => 'margin-left: 1em',
                            'templates' => [
                                'inputContainer' => '<div style="display: flex">{{content}}</div>'
                            ]
                        ]
                    );
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <div class="btnVoltar">
                <?= $this->Html->link(__('Voltar'), ['controller' => 'Pedidos', 'action' => 'index']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
