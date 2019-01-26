<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="columns" id="actions-sidebar">
  <ul class="vertical side-nav menu">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(
      __('New Category'),
      ['action' => 'add']) ?>
    </li>
              <li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $category->id],
        ['confirm' => __('Are you sure you want to delete # {0}?',
        $category->id)]
        )
        ?>
      </li>
        <li><?= $this->Html->link(
      __('List Categories'),
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
  </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
