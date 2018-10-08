<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<?php if ($this->request->session()->read('Auth.User.type') == 'admin'){ ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loan'), ['action' => 'edit', $loan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<?php } ?>
<div class="loans view large-9 medium-8 columns content">
    <h3><?= __('Loan') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Teacher') ?></th>
            <td><?= $loan->has('teacher') ? $this->Html->link($loan->teacher->first_name , ['controller' => 'Teachers', 'action' => 'view', $loan->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $loan->has('book') ? $this->Html->link($loan->book->book_title, ['controller' => 'Books', 'action' => 'view', $loan->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Of Fine') ?></th>
            <td><?= $this->Number->format($loan->amount_of_fine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Issued') ?></th>
            <td><?= h($loan->date_issued) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Due For Return') ?></th>
            <td><?= h($loan->date_due_for_return) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Returned') ?></th>
            <td><?= h($loan->date_returned) ?></td>
        </tr>
    </table>
</div>
