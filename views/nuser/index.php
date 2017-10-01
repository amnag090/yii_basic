<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nuser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'name',
            'phno',
            'email:email',
            'password:ntext',
            //'authKey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
