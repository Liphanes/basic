<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class GoodsModel extends ActiveRecord
{

    public function checkProducts($prod)
    {
       $query = "select * from dbo.products where name = '{$prod}'";
       //выполняем запрос
        $goods = ['tea','coffe','cacao'];
        $r_data = in_array($prod, $goods) ? $prod : null;
        return $r_data;
    }

    public function checkCount($prod, $count)
    {
        $query = "select count(*) from dbo.products where name = {$prod} and count >= {$count}";
        //выполняем запрос
        $r_data = 1;
        return $r_data;
    }

}
