<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<div class="grid-x grid-margin-x grid-padding-x">
  <nav class="cell small-4 medium-3 large-2" id="sidebar-nav">
  <ul class="vertical menu">
    <li><h2><?= __('Actions') ?></h2></li>
    <li><?= $this->Html->link(
      __('New Category'),
      ['action' => 'add']) ?>
    </li>
            <li><?= $this->Html->link(
      __('List Categories'),
      ['action' => 'index']) ?>
    </li>

          <li><hr></li>
      <li><?= $this->Html->link(
        __('List Articles'),
        ['controller' => 'Articles', 'action' => 'index']) ?>
      </li>
      <li><?= $this->Html->link(
        __('New Article'),
        ['controller' => 'Articles', 'action' => 'add']) ?>
      </li>
  </ul>
</nav>
    <div class="categories index large-9 medium-8 columns content">
        <h2><?= __('Categories') ?></h2>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                                                                                                                        <td><?= $this->Number->format($category->id) ?></td>
                                                                                                                                                          <td><?= h($category->name) ?></td>
                                                                                                                                                          <td><?= h($category->created) ?></td>
                                                                                                                                                          <td><?= h($category->modified) ?></td>
                                                                              <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
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
</div>
