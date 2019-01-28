<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

<div class="grid-x grid-margin-x grid-padding-x">
  <nav class="cell small-4 medium-3 large-2" id="sidebar-nav">
  <ul class="vertical menu">
    <li><h2><?= __('Actions') ?></h2></li>
    <li><?= $this->Html->link(
      __('New Article'),
      ['action' => 'add']) ?>
    </li>
            <li><?= $this->Html->link(
      __('List Articles'),
      ['action' => 'index']) ?>
    </li>

          <li><hr></li>
      <li><?= $this->Html->link(
        __('List Categories'),
        ['controller' => 'Categories', 'action' => 'index']) ?>
      </li>
      <li><?= $this->Html->link(
        __('New Category'),
        ['controller' => 'Categories', 'action' => 'add']) ?>
      </li>
      <li><hr></li>
      <li><?= $this->Html->link(
        __('List Tags'),
        ['controller' => 'Tags', 'action' => 'index']) ?>
      </li>
      <li><?= $this->Html->link(
        __('New Tag'),
        ['controller' => 'Tags', 'action' => 'add']) ?>
      </li>
  </ul>
</nav>
    <div class="articles index large-9 medium-8 columns content">
        <h2><?= __('Articles') ?></h2>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                                                                                                                                                          <td><?= $this->Number->format($article->id) ?></td>
                                                                                                                                            <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                                                                                                                                                                                                            <td><?= h($article->title) ?></td>
                                                                                                                                                                                            <td><?= h($article->created) ?></td>
                                                                                                                                                                                            <td><?= h($article->modified) ?></td>
                                                                              <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
