<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */

?>

<div class="books index large-9 medium-8 columns content">
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
