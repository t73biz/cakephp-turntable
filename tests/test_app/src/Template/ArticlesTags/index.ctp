<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesTag[]|\Cake\Collection\CollectionInterface $articlesTags
 */
?>

<nav class="columns" id="actions-sidebar">
  <ul class="vertical side-nav menu">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(
      __('New Articles Tag'),
      ['action' => 'add']) ?>
    </li>
            <li><?= $this->Html->link(
      __('List Articles Tags'),
      ['action' => 'index']) ?>
    </li>

          <li><?= $this->Html->link(
        __('List Articles'),
        ['controller' => 'Articles', 'action' => 'index']) ?>
      </li>
      <li><?= $this->Html->link(
        __('New Article'),
        ['controller' => 'Articles', 'action' => 'add']) ?>
      </li>
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
<div class="articlesTags index large-9 medium-8 columns content">
    <h3><?= __('Articles Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesTags as $articlesTag): ?>
            <tr>
                <td><?= $this->Number->format($articlesTag->id) ?></td>
                <td><?= $articlesTag->has('article') ? $this->Html->link($articlesTag->article->title, ['controller' => 'Articles', 'action' => 'view', $articlesTag->article->id]) : '' ?></td>
                <td><?= $articlesTag->has('tag') ? $this->Html->link($articlesTag->tag->id, ['controller' => 'Tags', 'action' => 'view', $articlesTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTag->id)]) ?>
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
