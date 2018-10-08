<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loans form large-9 medium-8 columns content">
    <?= $this->Form->create($loan) ?>
    <fieldset>
        <legend><?= __('Edit Loan') ?></legend>
        <?php
            echo $this->Form->control('teacher_id', ['options' => $teachers]);
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('date_issued');
            echo $this->Form->control('date_due_for_return');
            echo $this->Form->control('date_returned', ['empty' => true]);
            echo $this->Form->control('amount_of_fine');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
