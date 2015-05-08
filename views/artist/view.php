<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artist */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app_artist', 'Artists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="col-xs-3 artist-bar">
            <?=Html::img($model->logo , ['class' => 'thumbnail artist-detail-logo']); ?>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Карьера: Рок музыкант</li>
                <li class="list-group-item">Дата рождения: 24 мая 1987 года</li>
                <li class="list-group-item">Место рождения: Москва</li>
                <li class="list-group-item">Группа: <?=$model->group_id?></li>
            </ul>

            <button type="button" class="btn btn-success btn-lg btn-block">Фото-альбом группы Кино</button>
        </div>

        <div class="col-xs-9">
            <?=$model->description?>

            <div class="row">

                <div class="col-md-12">
                    <h3>Лучшие песни по мнению сайта *Название сайта*</h3>
                    <small>1989 Мороз рекордс русский рок</small>
                    <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/4477394&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                </div>

            </div>
        </div>

    </div>

</div>
