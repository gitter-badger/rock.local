<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 07.05.2015
 * Time: 21:13
 *
 * @var $data object
 */

use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row">

        <?php foreach ($data as $item): ?>


            <div class="col-sm-6 col-md-4">

                <div class="thumbnail">

                    <?=Html::img($item['logo'] , ['class' => 'thumbnail groups-logo']); ?>

                    <div class="caption">
                        <h3><a href="/group/<?= $item['id'] ?>"><?= $item['title'] ?></h3>

                        <p><a href="#" class="btn btn-primary" role="button">Фото</a> <a href="/group/<?= $item['id'] ?>" class="btn btn-default" role="button">О группе</a></p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>