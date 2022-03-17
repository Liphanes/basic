<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class BuyModel extends ActiveRecord
{

    public function approveBuy(array $params)
    {
        if(!empty($params)){
            //Тут запрос, если выполнен без ошибок то return true
            //т.к. делаю без бд то сразу return true
            return true;
        }
        return false;
    }



}
