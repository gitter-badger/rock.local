<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = Yii::t('app_admin_group', 'Update') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_group', 'Admin'), 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_group', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app_admin_group', 'Update');
?>
<div class="admin-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
