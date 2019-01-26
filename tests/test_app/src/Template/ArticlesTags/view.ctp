<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesTag $articlesTag
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
        __('Edit Articles Tag'),
        ['action' => 'edit', ]) ?>
      </li>
              <li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $articlesTag->id],
        ['confirm' => __('Are you sure you want to delete # {0}?',
        $articlesTag->id)]
        )
        ?>
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
<div class="articlesTags view large-9 medium-8 columns content">
  <h3><?= h($articlesTag->id) ?></h3>
  <table class="vertical-table">
                                      <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $articlesTag->has('article') ?
              $this->Html->link($articlesTag->article
              ->title, ['controller' =>
              'Articles', 'action' => 'view', $articlesTag
              ->article->id]) : '' ?>
            </td>
          </tr>
                                          <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $articlesTag->has('tag') ?
              $this->Html->link($articlesTag->tag
              ->id, ['controller' =>
              'Tags', 'action' => 'view', $articlesTag
              ->tag->id]) : '' ?>
            </td>
          </tr>
                                        <tr>
          <th scope="row"><?= __('Id') ?></th>
          <td><?= $this->Number->format($articlesTag->id) ?></td>
        </tr>
                    </table>
      </div>
