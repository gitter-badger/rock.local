<?php

use yii\helpers\Html;
use app\components\GroupWidget;

/* @var $this yii\web\View */
/* @var $models yii\data\ActiveDataProvider */

$this->title = Yii::t('app_group', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GroupWidget::widget([
        'data' => $models,
    ])?>

</div>
