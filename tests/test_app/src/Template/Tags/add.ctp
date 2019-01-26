<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="columns" id="actions-sidebar">
  <ul class="vertical side-nav menu">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(
      __('New Tag'),
      ['action' => 'add']) ?>
    </li>
            <li><?= $this->Html->link(
      __('List Tags'),
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
<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Add Tag') ?></legend>
        <?php
            echo $this->Form->control('term');
            echo $this->Form->control('articles._ids', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
