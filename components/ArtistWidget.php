<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 07.05.2015
 * Time: 20:57
 */

namespace app\components;

use yii\base\Widget;

class ArtistWidget extends Widget
{
    public $data;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('artist' , [
            'data' => $this->data,
        ]);
    }


}