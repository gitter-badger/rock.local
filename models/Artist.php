<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%artist}}".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $description
 * @property integer $group_id
 * @property string $logo
 */
class Artist extends ActiveRecord
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%artist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'description', 'group_id'], 'required'],
            [['description'], 'string'],
            [['group_id'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['logo'], 'file', 'extensions' => 'gif, jpg, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app_artist', 'ID'),
            'full_name' => Yii::t('app_artist', 'Full name'),
            'description' => Yii::t('app_artist', 'Description'),
            'group_id' => Yii::t('app_artist', 'Group ID'),
            'logo' => Yii::t('app_artist' , 'Logo'),
        ];
    }
}
