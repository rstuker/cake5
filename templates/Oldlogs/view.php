<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Oldlog $oldlog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Oldlog'), ['action' => 'edit', $oldlog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Oldlog'), ['action' => 'delete', $oldlog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldlog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Oldlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Oldlog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="oldlogs view content">
            <h3><?= h($oldlog->controller) ?></h3>
            <table>
                <tr>
                    <th><?= __('Controller') ?></th>
                    <td><?= h($oldlog->controller) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action') ?></th>
                    <td><?= h($oldlog->action) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $oldlog->hasValue('user') ? $this->Html->link($oldlog->user->username, ['controller' => 'Users', 'action' => 'view', $oldlog->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($oldlog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdat') ?></th>
                    <td><?= h($oldlog->createdat) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
