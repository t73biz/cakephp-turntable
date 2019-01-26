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
<div class="articlesTags form large-9 medium-8 columns content">
    <?= $this->Form->create($articlesTag) ?>
    <fieldset>
        <legend><?= __('Edit Articles Tag') ?></legend>
        <?php
            echo $this->Form->control('article_id', ['options' => $articles]);
            echo $this->Form->control('tag_id', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
