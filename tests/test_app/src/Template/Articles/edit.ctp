<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
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
              <li><?= $this->Form->postLink(
        __('Delete Article'),
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
<div class="articles form large-9 medium-8 columns content">
    <?= $this->FoundationForm->create($article) ?>
    <fieldset class="fieldset">
        <h2><?= __('Edit Article') ?></h2>
        <?php
            echo $this->FoundationForm->control('category_id', ['options' => $categories]);
            echo $this->FoundationForm->control('title');
            echo $this->FoundationForm->control('content');
            echo $this->FoundationForm->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->FoundationForm->button(__('Submit'),['class' => 'button success']) ?>
    <?= $this->FoundationForm->end() ?>
</div>
</div>
