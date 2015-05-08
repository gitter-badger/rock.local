<?php

use yii\helpers\Html;
use app\components\ArtistWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app_artist', 'Artists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=ArtistWidget::widget([
        'data' => $model,
    ])?>

</div>
