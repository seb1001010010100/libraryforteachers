<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = "library for teacher";

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?php if($this->Session->read("Auth.User.type") == 'teacher' || !$this->Session->read("Auth.User")){ ?>

      <?=   $this->Html->css('teachers.css') ?>

    <?php   } ?>
    <?php
        echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.js');
        echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
        echo $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
              <?php if($this->Session->read("Auth.User")){ ?>
                <h1><a href=""><?= $this->Session->read("Auth.User.email") ?></a></h1>
              <?php } ?>

            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="middle">
              <?php

              if($this->Session->read("Auth.User.type") == 'teacher'){
                echo '<li>'.$this->Html->link(__('Book list'), array('controller' => 'books', 'action' => 'index')).'</li>';
                echo '<li>'.$this->Html->link(__('Author list'), array('controller' => 'authors', 'action' => 'index')).'</li>';
                echo '<li>'.$this->Html->link(__('Category list'), array('controller' => 'categories', 'action' => 'index')).'</li>';
                if(!$this->Session->read("Auth.User.active")){

                  echo '<li>'.$this->Html->link(__('Resend Confirmation Mail'), array('controller' => 'users', 'action' => 'resendConfirm', $this->Session->read("Auth.User.id"))).'</li>';

                }

              }?>
            </ul>
            <ul class="right">
                <?php
                  echo '<li>'.$this->Html->link('A propos', array('controller' => 'Apropos', 'action' => 'index')).'</li>';
                  echo '<li>'.$this->Html->image('ch.jpg', array('height' => '32', 'width' => '32','url' => array('controller' => 'app', 'action' =>'changeLocale', 'de_DE'))).'</li>';
                  echo '<li>'.$this->Html->image('fr.jpg', array('height' => '32', 'width' => '32','url' => array('controller' => 'app', 'action' =>'changeLocale', 'fr'))).'</li>';
                  echo '<li>'.$this->Html->image('en.png', array('height' => '32', 'width' => '32','url' => array('controller' => 'app', 'action' =>'changeLocale', 'en_US'))).'</li>';
                  if($this->Session->read("Auth.User")){

                    if($this->Session->read("Auth.User.type") == 'teacher'){

                      echo '<li>'.$this->Html->link(__('Account'), array('controller' => 'users', 'action' => 'view', $this->Session->read("Auth.User.id"))).'</li>';

                    }
                    echo '<li>'.$this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')).'</li>';

                  }else{

                    echo '<li>'.$this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')).'</li>';
                    echo '<li>'.$this->Html->link(__('Register'), array('controller' => 'teachers', 'action' => 'add')).'</li>';

                  }

                 ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
