<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nuser */

$this->title = 'Create Nuser';
$this->params['breadcrumbs'][] = ['label' => 'Nusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
