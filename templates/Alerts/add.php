<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alert $alert
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="alerts form content">
            <?= $this->Form->create($alert) ?>
            <fieldset>
                <legend><?= __('Add Alert') ?></legend>
                <?php
                    echo $this->Form->control('role_id', ['options' => $roles]);
                    echo $this->Form->control('message',['type'=>'textarea','cols'=>'80']);
                    echo $this->Form->control('periodfrom');
                    echo $this->Form->control('periodto');
                    echo $this->Form->control('active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
