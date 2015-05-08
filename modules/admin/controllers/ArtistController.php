<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Artist;
use app\models\ArtistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArtistController implements the CRUD actions for Artist model.
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
     * Lists all Artist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artist model.
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
     * Создаём новую модель Артиста.
     * Если создание прошло успешно, то перенаправляем на просмотр Артиста.
     * @return mixed
     */
    public function actionCreate()
    {
        /* Создаём новую модель артиста */
        $model = new Artist();

        /* Если модель удачно заполнилась данными из массива POST , то */
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
                    $model->file->saveAs('images/artist/logo/' . $file_name . '.' . $model->file->extension);

                    /* Всвойсво объекта ложим информацию о расположении файла логотипа данного объекта, для дальнейшей записи в базу данных */
                    $model->logo = '@web/images/artist/logo/' . $file_name . '.' . $model->file->extension;

                    /* Сохраняем объект в базу */
                    $model->save();
                }
            }

            /* Перенаправляем пользователя на страницу созданного объекта */
            return $this->redirect(['view', 'id' => $model->id]);

            /* Если же модель не заполнилась данными, то их там просто нет, значит */
        } else {

            /* Отображаем страницу создания артиста */
            return $this->render('create', ['model' => $model,]);

        }
    }

    /**
     * Изминение модели артиста
     * Если изминение прошло успешно то редирект на просмотр данного объекта
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!empty(UploadedFile::getInstance($model, 'logo'))){

            /* Разбиваем путь по слешу */
            /* Удаляем 0 значение масива */
            /* Удаляем логотип */
            $path = explode('/' , $model->logo);
            unset($path[0]);
            unlink(implode('/' , $path));
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            /* Проверяем данные точно пришли из поста, если да, то */
            if (Yii::$app->request->isPost) {

                /* В свойство File объекта артиста перекладываем информацию о загруженном файле из поля logo */
                $model->file = UploadedFile::getInstance($model, 'logo');

                /* Если данные успешно перенеслись в свойство объекта, то */
                if (!empty($model->file)) {

                    /* Генерируем имя файла для логотипа */
                    $file_name = substr(md5(uniqid()), 0, 7);

                    /* Переносим фаил в нужную категорию с нужным иминем и расширением */
                    $model->file->saveAs('images/artist/logo/' . $file_name . '.' . $model->file->extension);

                    /* Всвойсво объекта ложим информацию о расположении файла логотипа данного объекта, для дальнейшей записи в базу данных */
                    $model->logo = '@web/images/artist/logo/' . $file_name . '.' . $model->file->extension;

                    /* Сохраняем объект в базу */
                    $model->save();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Удаление артиста и его логотипа
     * Если удаление пройдёт нормально то редирект на главную
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        /*Ищем модель по ид*/
        $model = $this->findModel($id);

        /* Если свойство logo не пусто, то... */
        if (!empty($model->logo)){

            /* Разбиваем путь по слешу */
            /* Удаляем 0 значение масива */
            /* Удаляем логотип */
            $path = explode('/' , $model->logo);
            unset($path[0]);
            unlink(implode('/' , $path));
        }

        /* Удаляем и саму модель */
        /*Ридеректим на экшен index*/
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Поиск модели артиста
     * Если не найдёт то 404
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
