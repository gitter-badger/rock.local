<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_admin_group', 'Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_group', 'Admin'), 'url' => ['/admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <p><?= Html::a(Yii::t('app_admin_group', 'Create Group'), ['create'], ['class' => 'btn btn-success pull-right']) ?></p>
    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'logo',
                'format'=>'html',
                'value'=>function($model)
                {
                    return Html::img($model->logo , ['class' => 'admin-groups-logo']);
                }
            ],

            'id',
            'title',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
