<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
 echo $this->Html->css('dropzone');
 echo $this->Html->script('Books/dropzone');
?>
<?= $this->Html->css('materialize/css/materialize.min.css') ?>
<?php echo $this->Html->script('Books/index'); ?>

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
<div class="container" ng-app="CakeJwtAngularjs">
    <div class="container" ng-controller="usersCtrl" class="d-inline-block align-top-right">
        <!-- floating button for login -->
        <div id="login-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-login-form"><i class="material-icons left"></i>Login</a>
        </div>
        <!-- modal for user login -->
        <div id="modal-login-form" class="modal">
            <div class="modal-content">
                <h4 id="modal-login-title">Login</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="username" type="text" class="validate" id="username" name="username" placeholder="Type username here..." />
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input ng-model="password" type="password" class="validate" id="password" name="password" placeholder="Type password here..." />
                        <label for="password">Password</label>
                    </div>
                    <br />
                    <div class="input-field col s12" id="example1"></div>
                    <p style="color:red;">{{ captcha_status }}</p>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="login()"><i class="material-icons left"></i>Login</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left"></i>Close</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- floating button for logout/change password -->
        <div id="logout-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-logout-form"><i class="material-icons left"></i>Logout (Change Password)</a>
        </div>
        <!-- modal for user login -->
        <div id="modal-logout-form" class="modal">
            <div class="modal-content">
                <h4 id="modal-login-title">Logout or Change Password</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="newPassword" type="password" class="validate" id="form-password" placeholder="Type password here..." />
                        <label for="password">New Password</label>
                    </div>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="changePassword()"><i class="material-icons left"></i>Change Password</a>
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="logout()"><i class="material-icons left"></i>Logout</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left"></i>Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="books index large-9 medium-8 columns content">

    <h3> <?= __('Give Us A Picture For No Reason') ?>
      <div class="image_upload_div">
      <?php  echo $this->Form->create('image',array('url'=>array('controller'=>'Books','action'=>'drop'),'method'=>'post','id'=>'my-awesome-dropzone','class'=>'dropzone','type'=>'file','autocomplete'=>'off',));?>

      <?php    echo $this->Form->end();?>
    </div>
    <h3><?= __('Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_publication') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $this->Html->image($book->image, array('height' => '128', 'width' => '128')); ?></td>
                <td><?= h($book->book_title) ?></td>
                <td><?= h($book->date_of_publication) ?></td>
                <?php

                  if($book->status){?>

                    <td><?= __('Available') ?></td>

                  <?php }else{ ?>

                    <td><?= __('Rented') ?></td>

                <?php  } ?>


                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                    <?php if($book->status && $this->request->session()->read('Auth.User.type') == 'teacher'){ ?>
                      <?= $this->Html->link(__('Rent'), ['action' => 'rent', $book->id]) ?>
                    <?php } ?>
                    <?php if ($this->request->session()->read('Auth.User.type') == 'admin'){ ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer></script>

<script>
    var onloadCallback = function() {
        widgetId1 = grecaptcha.render('example1', {

            'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
            'Secret key' : '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe',
            'theme' : 'light'
        });
    };

</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer>
