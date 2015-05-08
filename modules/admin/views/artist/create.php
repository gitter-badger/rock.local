<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Artist */

$this->title = Yii::t('app_admin_artist', 'Create Artist');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_artist', 'Admin'), 'url' => ['/admin/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_admin_artist', 'Artists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-artist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
