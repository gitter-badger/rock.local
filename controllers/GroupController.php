<?php

namespace app\controllers;

use Yii;
use app\models\Artist;
use app\models\Group;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController - Реализует работу каталога рок групп.
 * Работает с моделью Group
 */
class GroupController extends Controller
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
     * Отображение всех групп
     * @return mixed
     */
    public function actionIndex()
    {
        $models = Group::find()->asArray()->all();

        return $this->render('index', [
            'models' => $models
        ]);
    }

    /**
     * Отображение объекта Группы
     * @param integer $id Номер объекта
     * @return mixed
     */
    public function actionView($id)
    {
        /*Передаём в шаблон саму модель и связанных артистов*/
        return $this->render('view', [
            'model' => $this->findModel($id),
            'artists' => Artist::find()->where(['group_id' => $id])->all(),
        ]);
    }

    /**
     * Поиск модели по её номеру
     * Если модель найдена не будет, то кидаем 404
     * @param integer $id номер модели которую ищем
     * @return Group Загрузка модели
     * @throws NotFoundHttpException Если модель найдена не будет то кидаем исключение
     */
    protected function findModel($id)
    {
        /* Если поиск модели в классе Групп успешный, то ... */
        if (($model = Group::findOne($id)) !== null) {

            /* Возвращаем объект модели */
            return $model;

        /* Если же Модель не найдена, то ... */
        } else {

            /* Кидаем исключение */
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
