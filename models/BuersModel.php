<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class BuersModel extends ActiveRecord
{

    public function setBuers($client)
    {
        if(!empty($client)){
            $id = 11;
            //insert новой строки из неё берем просто id и это будет id заказа а дальше
            // return id для записи строк блюд что бы можно было связать
            //т.к. делаю без бд то сразу return id
            return $id;
        }
        return false;
    }



}
