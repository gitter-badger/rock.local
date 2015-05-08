<?php

namespace app\controllers;

use Yii;
use app\models\Artist;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistController Контроллер для реализации каталога артистов и солистов, использует модель Artist
 */
class ArtistController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Отображение всех артистов
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Artist::find()->asArray()->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Отображение 1 артиста
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Поиск модели артиста
     * Если найдено не будет, то 404
     * @param integer $id
     * @return Artist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
