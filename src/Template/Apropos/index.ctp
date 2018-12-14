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
    <h2>Intérêt de mon prototype</h2>
     <p>Ce prototype est spécifiquement utile pour les bibliothèque (quoi que pourrais être modifier pour encompasser d'autre entreprise qui ce spécialise dans la location en tout genre). La cible de cette Applications
       est donc les bibliothèque, car elle donne au usagé la fonctionnalité de suivre leurs location, pouvoir voir l'inventaire de la bibliothèque et pouvoir louer quelque chose directement (la fonctionnalité devrait être amélioré).</p>
    <h2>Information Personnel</h2>
    <p>Nom : Sebastien Hamel </br>
      Le titre du cours: 420-5b7 MO Applications internet. Automne 2018, Collège Montmorency. </br>
      <?= $this->Html->link(__('Adrese GitHub'), 'https://github.com/seb1001010010100/libraryforteachers'); ?></br>
      Description : Ce site est une librairie pour professeur.</br>
      Le professeur peu ce connecter, voir la liste des livres disponible ou non, louer des livres, voir ses prèt, voir la liste des auteurs et categories de livres.</br>
      Un visiteur peu seulement voir la liste des livres, s'inscrire, voir la page a propos, et se connecter. </br>
      L'admin a le droit de tout faire. Email : admin@admin.com MDP: z </br></br></p>
      <h2>TP3</h2>
      <p>Le démarrage de session et le changement de mot de passe ce fait sur l'index de book <a href="http://localhost/libraryforteachers">(index du site complet)</a>. Le capcha est fonctionelle. Pour changer de mot de passe, utiliser le username : admin, et le password : z</br>
        les listes liées sont dans <a href="http://localhost/libraryforteachers/books/add">l'ajout de livre</a> (add book). Les liste sont le medium(livre,film,jeux video) et le type.</br>
        le modèle "CRUD" monopage est dans <a href="http://localhost/libraryforteachers/authors">authors</a></br>
        Le fonctionnement du cliquer-glisser pour ajouter une image à l'application est dans l'index du livre <a href="http://localhost/libraryforteachers">(index du site complet)</a>, mais ne fait qu'enregistrer l'image sur le serveur sans la sauvegarder dans la base de donne</br>
        Probleme : L'index du site <a href="http://localhost/libraryforteachers">(index de livre)</a> n'affiche plus la sidebar d'action (lorsque connect en admin) a cause de l'implementation du css de materialize. Utilisez le chemin dans la bar de navigation pour change de page (sorry).</p>
      <h2>TP2</h2>
      <p>Les liste lier est dans l'add et l'edit d'un livre (medium et type)</br>
      L'autocomplete est dans l'add et l'edit d'un livre (tag)</br>
      Les tests pour le champ boolean est dans le BooksTableTest</br>
      Le test des contraintes est dans le BooksControllerTest</br>
      Le test xss ne fonctionne pas, cake ne filtre pas le data (UsersTableTest).</br>
      Le test de validation est dans le usersTableTest (testSaving).</br>
      Le lien pour le  <a href="http://localhost/libraryforteachers/webroot/coverage/index.html">coverage</a></br>
      La monopage est dans <a href="http://localhost/libraryforteachers/authors">l'index des auteurs </a></br>
      La version <a href="http://localhost/libraryforteachers/admin/authors"> admin </a> </br>


      </p>
      <?= $this->Html->link(__('Lien vers le model original'), 'http://www.databaseanswers.org/data_models/library_for_teachers/index.htm'); ?></br>
      <td><?= $this->Html->image('library_for_teachers_dezign.png'); ?></td></br>
