<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('foundation/foundation.min') ?>
    <?= $this->Html->css('Turntable.style') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="title-bar" data-responsive-toggle="top-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title">Menu</div>
    </div>
    <div class="top-bar" id="top-menu">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">
                    <h1>
                        <a href=""><?= $this->fetch('title') ?></a>
                    </h1>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </div>

    <?= $this->Flash->render() ?>
    <div class="grid-container fluid">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
    <?= $this->Html->script('foundation/foundation.min') ?>
    <?= $this->Html->script('Turntable.app') ?>
    <?= $this->fetch('script') ?>
</body>
</html>
