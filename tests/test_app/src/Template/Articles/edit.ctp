<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="columns" id="actions-sidebar">
  <ul class="vertical side-nav menu">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(
      __('New Article'),
      ['action' => 'add']) ?>
    </li>
              <li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $article->id],
        ['confirm' => __('Are you sure you want to delete # {0}?',
        $article->id)]
        )
        ?>
      </li>
        <li><?= $this->Html->link(
      __('List Articles'),
      ['action' => 'index']) ?>
    </li>

          <li><?= $this->Html->link(
        __('List Categories'),
        ['controller' => 'Categories', 'action' => 'index']) ?>
      </li>
      <li><?= $this->Html->link(
        __('New Category'),
        ['controller' => 'Categories', 'action' => 'add']) ?>
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
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
