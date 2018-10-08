<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LibraryRule[]|\Cake\Collection\CollectionInterface $libraryRules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Library Rule'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="libraryRules index large-9 medium-8 columns content">
    <h3><?= __('Library Rules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('overdue_daily_fine') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libraryRules as $libraryRule): ?>
            <tr>
                <td><?= $this->Number->format($libraryRule->overdue_daily_fine) ?></td>
                <td><?= h($libraryRule->created) ?></td>
                <td><?= h($libraryRule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $libraryRule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $libraryRule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $libraryRule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libraryRule->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
