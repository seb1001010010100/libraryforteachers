<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author[]|\Cake\Collection\CollectionInterface $authors
 */
?>
<?php if ($this->request->session()->read('Auth.User.type') == 'admin'){ ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Author'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?php } ?>
<div class="apropos index large-9 medium-8 columns content">
    <h3><?= __('A Propos') ?></h3>
    <p>Nom : Sebastien Hamel </br>
      Le titre du cours: 420-5b7 MO Applications internet. Automne 2018, Collège Montmorency. </br>
      <?= $this->Html->link(__('Adrese GitHub'), 'https://github.com/seb1001010010100/libraryforteachers'); ?></br>
      Description : Ce site est une librairie pour professeur.</br>
      Le professeur peu ce connecter, voir la liste des livres disponible ou non, louer des livres, voir ses prèt, voir la liste des auteurs et categories de livres.</br>
      Un visiteur peu seulement voir la liste des livres, s'inscrire, voir la page a propos, et se connecter. </br>
      L'admin a le droit de tout faire. Email : admin@admin.com MDP: z </br></p>
      <?= $this->Html->link(__('Lien vers le model original'), 'http://www.databaseanswers.org/data_models/library_for_teachers/index.htm'); ?></br>
      <td><?= $this->Html->image('library_for_teachers_dezign.png'); ?></td></br>
