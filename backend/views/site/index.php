<?php

/* @var $user common\models\User */

use hail812\adminlte3\widgets\Alert;

$this->title = 'Admin panel';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <?= Alert::widget([
                'type' => 'success',
                'body' => '<h3>Welcome to Admin panel!</h3>',
            ]) ?>
        </div>
    </div>
</div>