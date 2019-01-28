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
          <li><?= $this->Html->link(
        __('Edit Article'),
        ['action' => 'edit', $article->id]) ?>
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
</nav>  <div class="articles view cell small-8 content">
    <h2><?= h($article->title) ?></h2>
    <table class="vertical-table">
                                                <tr>
              <th scope="row"><?= __('Category') ?></th>
              <td><?= $article->has('category') ?
                $this->Html->link($article->category
                ->name, ['controller' =>
                'Categories', 'action' => 'view', $article
                ->category->id]) : '' ?>
              </td>
            </tr>
                                        <tr>
              <th scope="row"><?= __('Title') ?></th>
              <td><?= h($article->title) ?></td>
            </tr>
                                                      <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
          </tr>
                                      <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
          </tr>
                  <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
          </tr>
                        </table>
                  <div class="row">
          <h4><?= __('Content') ?></h4>
          <?= $this->Text->autoParagraph(h($article->content)); ?>
        </div>
                                    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($article->tags)): ?>
        <table cellpadding="0" cellspacing="0">
          <tr>
                          <th scope="col"><?= __('Id') ?></th>
                          <th scope="col"><?= __('Term') ?></th>
                          <th scope="col"><?= __('Created') ?></th>
                          <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($article->tags as
          $tags): ?>
          <tr>
                          <td><?= h($tags->id) ?></td>
                          <td><?= h($tags->term) ?></td>
                          <td><?= h($tags->created) ?></td>
                          <td><?= h($tags->modified) ?></td>
                                    <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' =>
              'Tags', 'action' => 'view', $tags->id])
              ?>
              <?= $this->Html->link(__('Edit'), ['controller' =>
              'Tags', 'action' => 'edit', $tags->id])
              ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' =>
              'Tags', 'action' => 'delete', $tags->id
              ], ['confirm' => __('Are you sure you want to delete #
              {0}?', $tags->id)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        <?php endif; ?>
      </div>
      </div>
</div>
