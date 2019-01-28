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
          <li><?= $this->Html->link(
        __('Edit Tag'),
        ['action' => 'edit', $tag->id]) ?>
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
</nav>  <div class="tags view cell small-8 content">
    <h2><?= h($tag->term) ?></h2>
    <table class="vertical-table">
                                    <tr>
              <th scope="row"><?= __('Term') ?></th>
              <td><?= h($tag->term) ?></td>
            </tr>
                                                      <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
          </tr>
                                      <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
          </tr>
                  <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
          </tr>
                        </table>
                              <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($tag->articles)): ?>
        <table cellpadding="0" cellspacing="0">
          <tr>
                          <th scope="col"><?= __('Id') ?></th>
                          <th scope="col"><?= __('Category Id') ?></th>
                          <th scope="col"><?= __('Title') ?></th>
                          <th scope="col"><?= __('Content') ?></th>
                          <th scope="col"><?= __('Created') ?></th>
                          <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($tag->articles as
          $articles): ?>
          <tr>
                          <td><?= h($articles->id) ?></td>
                          <td><?= h($articles->category_id) ?></td>
                          <td><?= h($articles->title) ?></td>
                          <td><?= h($articles->content) ?></td>
                          <td><?= h($articles->created) ?></td>
                          <td><?= h($articles->modified) ?></td>
                                    <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' =>
              'Articles', 'action' => 'view', $articles->id])
              ?>
              <?= $this->Html->link(__('Edit'), ['controller' =>
              'Articles', 'action' => 'edit', $articles->id])
              ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' =>
              'Articles', 'action' => 'delete', $articles->id
              ], ['confirm' => __('Are you sure you want to delete #
              {0}?', $articles->id)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        <?php endif; ?>
      </div>
      </div>
</div>
