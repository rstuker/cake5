<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Oldlog $oldlog
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Oldlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="oldlogs form content">
            <?= $this->Form->create($oldlog) ?>
            <fieldset>
                <legend><?= __('Add Oldlog') ?></legend>
                <?php
                    echo $this->Form->control('controller');
                    echo $this->Form->control('action');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('createdat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
