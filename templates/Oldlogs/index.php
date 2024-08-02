<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Oldlog> $oldlogs
 */
?>
<div class="oldlogs index content">
    <?= $this->Html->link(__('New Oldlog'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Oldlogs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('controller') ?></th>
                    <th><?= $this->Paginator->sort('action') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('createdat') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oldlogs as $oldlog): ?>
                <tr>
                    <td><?= $this->Number->format($oldlog->id) ?></td>
                    <td><?= h($oldlog->controller) ?></td>
                    <td><?= h($oldlog->action) ?></td>
                    <td><?= $oldlog->hasValue('user') ? $this->Html->link($oldlog->user->username, ['controller' => 'Users', 'action' => 'view', $oldlog->user->id]) : '' ?></td>
                    <td><?= h($oldlog->createdat) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $oldlog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oldlog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oldlog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldlog->id)]) ?>
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
