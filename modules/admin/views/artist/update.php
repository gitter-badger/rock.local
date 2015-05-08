<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artist */

$this->title = Yii::t('app_admin_artist', 'Update') . ' ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_artist', 'Artists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_admin_artist', 'Update');
?>
<div class="artist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
