<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 10.05.2015
 * Time: 17:10
 */

namespace app\components;

use yii\base\Widget;


class SubMenuWidget extends Widget {

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('menu' , [
            'data' => 'a',
        ]);
    }

}