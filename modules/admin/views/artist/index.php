<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_admin_artist', 'Artists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app_admin_artist', 'Create Artist'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'description:ntext',
            'group_id',
            'logo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
