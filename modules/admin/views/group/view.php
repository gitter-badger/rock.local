<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_group', 'Admin'), 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_group', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app_admin_group', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app_admin_group', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app_admin_group', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:html',
            [
                'label' => Yii::t('app_group', 'Logo'),
                'value' => Html::img($model->logo , ['class' => 'admin-groups-logo']),
                'format' => 'html'
            ],

        ],
    ]) ?>

</div>
