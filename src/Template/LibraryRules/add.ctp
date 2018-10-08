<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LibraryRule $libraryRule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Library Rules'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="libraryRules form large-9 medium-8 columns content">
    <?= $this->Form->create($libraryRule) ?>
    <fieldset>
        <legend><?= __('Add Library Rule') ?></legend>
        <?php
            echo $this->Form->control('overdue_daily_fine');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
