<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>

<?php if ($this->request->session()->read('Auth.User.type') == 'admin'){ ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?php } ?>
<div class="books index large-9 medium-8 columns content">
    <h3><?= __('Rent this books?') ?></h3>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image($book->image, array('height' => '128', 'width' => '128')); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($book->book_title) ?></td>
        </tr>
    </table>
    <?= $this->Form->create($book); ?>
    <?=$this->Html->link(__('Cancel'), ['action' => 'index']); ?>
    <?= $this->Form->button(__('Rent')) ?>
    <?= $this->Form->end() ?>
</div>
