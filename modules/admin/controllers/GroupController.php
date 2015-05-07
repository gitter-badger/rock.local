<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Group;
use app\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * GroupController для реализации управления каталогом Групп.
 */
class GroupController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Список всех групп, в админке
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Отображение 1 группы в админке.
     * @param integer $id Номер группы
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создание новой группы
     * @return mixed
     */
    public function actionCreate()
    {
        /* Создаём новый объект модели Группы */
        $model = new Group();

        /* Если загрузка из поста в модель прошла успешно, то..*/
        if ($model->load(Yii::$app->request->post())) {

            /* Проверяем данные точно пришли из поста, если да, то */
            if (Yii::$app->request->isPost) {

                /* В свойство File объекта артиста перекладываем информацию о загруженном файле из поля logo */
                $model->file = UploadedFile::getInstance($model, 'logo');

                /* Если данные успешно перенеслись в свойство объекта, то */
                if (!empty($model->file)) {

                    /* Генерируем имя файла для логотипа */
                    $file_name = substr(md5(uniqid()), 0, 7);

                    /* Переносим фаил в нужную категорию с нужным иминем и расширением */
                    $model->file->saveAs('images/group/logo/' . $file_name . '.' . $model->file->extension);

                    /* Всвойсво объекта ложим информацию о расположении файла логотипа данного объекта, для дальнейшей записи в базу данных */
                    $model->logo = '@web/images/group/logo/' . $file_name . '.' . $model->file->extension;

                    /* Сохраняем объект в базу */
                    $model->save();
                }
            }

            /* Перенаправляем пользователя на созданную группу */
            return $this->redirect(['view', 'id' => $model->id]);

            /* Если же загрузка из поста не прошла значит он пуст, и ... */
        } else {

            /* паказываем форму на добавление записи */
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Изминение группы
     * @param integer $id Получаем номер группы
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /* По номеру получаем объект группы*/
        $model = $this->findModel($id);

        /* Если загрузка из поста в модель прошла успешно, то..*/
        if ($model->load(Yii::$app->request->post())) {

            /* Проверяем данные точно пришли из поста, если да, то */
            if (Yii::$app->request->isPost) {

                /* В свойство File объекта артиста перекладываем информацию о загруженном файле из поля logo */
                $model->file = UploadedFile::getInstance($model, 'logo');

                /* Если данные успешно перенеслись в свойство объекта, то */
                if (!empty($model->file)) {

                    /* Генерируем имя файла для логотипа */
                    $file_name = substr(md5(uniqid()), 0, 7);

                    /* Переносим фаил в нужную категорию с нужным иминем и расширением */
                    $model->file->saveAs('images/group/logo/' . $file_name . '.' . $model->file->extension);

                    /* Всвойсво объекта ложим информацию о расположении файла логотипа данного объекта, для дальнейшей записи в базу данных */
                    $model->logo = '@web/images/group/logo/' . $file_name . '.' . $model->file->extension;

                    /* Сохраняем объект в базу */
                    $model->save();
                }
            }

            /* Перенаправляем пользователя на страницу редактируемой группы */
            return $this->redirect(['view', 'id' => $model->id]);

            /* Если же загрузка из поста не прошла значит он пуст, и ... */
        } else {

            /* Паказываем форму с данными от старой модели */
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Удаление модели объекта
     * Если есть логотип, то удаляем и файл логотипа с сервера
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        /*Ищем модель по ид*/
        $model = $this->findModel($id);

        /* Если свойство logo не пусто, то... */
        if (!empty($model->logo)){

            /* Удаляем логотип */
            unlink($model->logo);
        }

        /* Удаляем и саму модель */
        $model->delete();

        /*Ридеректим на экшен index*/
        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
