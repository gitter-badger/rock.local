<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * This is the model class for table "{{%group}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $logo
 */
class Group extends ActiveRecord
{
    /**
     * @var UploadedFile Свойство для загрузки логотипа
     */
    public $file;

    /**
     * @inheritdoc Имя таблицы в базе данных
     */
    public static function tableName()
    {
        return '{{%group}}';
    }

    /**
     * @inheritdoc Правила для полей формы добавления и изминения записи
     */
    public function rules()
    {
        return [
            [['title', 'description', 'logo'], 'required'],
            [['description', 'title'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['logo'], 'file', 'extensions' => 'gif, jpg, png'],
        ];
    }

    /**
     * @inheritdoc Создаём ярлыки с другими названия для удобства отображения имён колонок
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_group', 'ID'),
            'title' => Yii::t('app_group', 'Title'),
            'description' => Yii::t('app_group', 'Description'),
            'logo' => Yii::t('app_group', 'Logo'),
        ];
    }
}
