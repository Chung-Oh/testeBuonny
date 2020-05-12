<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="produtos form content">
            <?= $this->Form->create($produto) ?>
            <fieldset>
                <legend><?= __('Add Produto') ?></legend>
                <?php
                    echo $this->Form->control('descricao',
                        [
                            'label' => __('Produto'),
                            'class' => 'col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10',
                            'style' => 'margin-left: 1em',
                            'templates' => [
                                'inputContainer' => '<div style="display: flex">{{content}}</div>'
                            ]
                        ]
                    );
                    echo $this->Form->control('preco',
                        [
                            'label' => __('Preço'),
                            'class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6',
                            'style' => 'margin-left: 2.2em',
                            'templates' => [
                                'inputContainer' => '<div style="display: flex">{{content}}</div>'
                            ]
                        ]
                    );
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
