<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LibraryRule $libraryRule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Library Rule'), ['action' => 'edit', $libraryRule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Library Rule'), ['action' => 'delete', $libraryRule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libraryRule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Library Rules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Library Rule'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="libraryRules view large-9 medium-8 columns content">
    <h3><?= h($libraryRule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($libraryRule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Overdue Daily Fine') ?></th>
            <td><?= $this->Number->format($libraryRule->overdue_daily_fine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($libraryRule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($libraryRule->modified) ?></td>
        </tr>
    </table>
</div>
