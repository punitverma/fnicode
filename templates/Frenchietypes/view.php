<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchietype $frenchietype
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="frenchietypes view content">
            <h3><?= h($frenchietype->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($frenchietype->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= h($frenchietype->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Commission') ?></th>
                    <td><?= $this->Number->format($frenchietype->commission) ?>%</td>
                </tr>
            </table>
        </div>
    </div>
</div>
