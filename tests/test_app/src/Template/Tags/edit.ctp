<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="grid-x grid-margin-x grid-padding-x">
  <nav class="cell small-4 medium-3 large-2" id="sidebar-nav">
  <ul class="vertical menu">
    <li><h2><?= __('Actions') ?></h2></li>
    <li><?= $this->Html->link(
      __('New Tag'),
      ['action' => 'add']) ?>
    </li>
              <li><?= $this->Form->postLink(
        __('Delete Tag'),
        ['action' => 'delete', $tag->id],
        ['confirm' => __('Are you sure you want to delete # {0}?',
        $tag->id)]
        )
        ?>
      </li>
        <li><?= $this->Html->link(
      __('List Tags'),
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
<div class="tags form large-9 medium-8 columns content">
    <?= $this->FoundationForm->create($tag) ?>
    <fieldset class="fieldset">
        <h2><?= __('Edit Tag') ?></h2>
        <?php
            echo $this->FoundationForm->control('term');
            echo $this->FoundationForm->control('articles._ids', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->FoundationForm->button(__('Submit'),['class' => 'button success']) ?>
    <?= $this->FoundationForm->end() ?>
</div>
</div>
