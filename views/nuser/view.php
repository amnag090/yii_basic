<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nuser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'name',
            'phno',
            'email:email',
            'password:ntext',
            'authKey',
        ],
    ]) ?>

</div>
