<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cop'), ['action' => 'edit', $cop->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cop'), ['action' => 'delete', $cop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cop->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cops'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cop'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cops view large-9 medium-8 columns content">
    <h3><?= h($cop->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($cop->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($cop->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Station') ?></th>
            <td><?= $cop->has('station') ? $this->Html->link($cop->station->name, ['controller' => 'Stations', 'action' => 'view', $cop->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cop->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cop->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cop->modified) ?></td>
        </tr>
    </table>
</div>
