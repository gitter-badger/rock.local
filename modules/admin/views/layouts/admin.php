<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body>

    <?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">

            <div class="col-md-12">
                <?php
                NavBar::begin([
                    'brandLabel' => 'My Company',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-default navbar-fixed-top',
                    ],
                ]);
                echo Nav::widget([
                    'encodeLabels' => false,
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-home"></span> Главная', 'url' => ['/admin/default/index']],
                        ['label' => '<span class="glyphicon glyphicon-user"></span> Артисты', 'url' => ['/admin/artist/index']],
                        ['label' => '<span class="glyphicon glyphicon-star-empty"></span> Группы', 'url' => ['/admin/group/index']],
                        ['label' => '<span class="glyphicon glyphicon-picture"></span> Фото', 'url' => ['/admin/site/about']],
                        ['label' => '<span class="glyphicon glyphicon-file"></span> Новости', 'url' => ['/admin/site/contact']],
                        [
                            'label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::$app->user->identity->username,
                            'items' => [
                                ['label' => 'Сообщения <span class="badge">4</span>', 'url' => '#'],
                                '<li class="divider"></li>',
                                '<li class="dropdown-header">Выход</li>',
                                ['label' => 'Выйти из админки', 'url' => '#'],
                            ],
                        ],

                    ],
                ]);
                NavBar::end();
                ?>

            </div>

            <div class="col-md-12">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>

            <div class="col-md-12">
                <?= $content ?>
            </div>
        </div>
        <div class="container">

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
