
<?php use Cake\Routing\Router; ?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Mediums",
    "action" => "getMediums",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Books/add');
?>


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


<div class="books form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="mediumsController">

    <?= $this->Form->create($book, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <div>
          Mediums:
          <select name="medium_id"
                  id="medium-id"
                  ng-model="medium"
                  ng-options="medium.name for medium in mediums track by medium.id"
                  >
              <option value=''>Select</option>
          </select>
      </div>
      <div>
          Types:
          <select name="type_id"
                  id="type-id"
                  ng-disabled="!medium"
                  ng-model="type"
                  ng-options="type.name for type in medium.types track by type.id"
                  >
              <option value=''>Select</option>
          </select>
      </div>
        <?php
            echo $this->Form->input('book_title', ['type' => 'text']);
            echo $this->Form->control('date_of_publication');
            echo $this->Form->control('authors._ids', ['options' => $authors]);
            echo $this->Form->control('categories._ids', ['options' => $categories]);
            echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']);
            echo $this->Form->input('Tag', ['type' => 'text'])
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
