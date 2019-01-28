<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
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
<div class="categories form large-9 medium-8 columns content">
    <?= $this->FoundationForm->create($category) ?>
    <fieldset class="fieldset">
        <h2><?= __('Add Category') ?></h2>
        <?php
            echo $this->FoundationForm->control('name');
        ?>
    </fieldset>
    <?= $this->FoundationForm->button(__('Submit'),['class' => 'button success']) ?>
    <?= $this->FoundationForm->end() ?>
</div>
</div>
