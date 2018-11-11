
<?php use Cake\Routing\Router; ?>



<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->control('medium_id', ['options' => $mediums]);
            echo $this->Form->control('type_id', ['options' => $types]);
            echo $this->Form->input('book_title', ['type' => 'text']);
            echo $this->Form->control('date_of_publication');
            echo $this->Form->control('authors._ids', ['options' => $authors]);
            echo $this->Form->control('categories._ids', ['options' => $categories]);
            echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']);
            echo $this->Form->input('tag', ['type' => 'text'])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    jQuery('#tag').autocomplete({
        source:'<?php echo Router::url(array('controller' => 'Books', 'action' => 'findTags')); ?>',
        minLength: 1
    });
</script>
