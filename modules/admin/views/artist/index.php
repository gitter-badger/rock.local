<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Artist */

$this->title = Yii::t('app_admin_artist', 'Artists');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_artist', 'Admin'), 'url' => ['/admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artist-index">

    <p><?= Html::a(Yii::t('app_admin_artist', 'Create Artist'), ['create'], ['class' => 'btn btn-success pull-right']) ?></p>

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'logo',
                'format' => 'html',
                'value'=>function($model)
                {
                    return Html::img($model->logo , ['class' => 'admin-groups-logo']);
                }
            ],
            'full_name',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value'=>function($model)
                {
                    return substr($model->description , 0 , 1200);
                }
            ],
            'group_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
