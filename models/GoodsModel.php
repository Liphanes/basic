<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class GoodsModel extends ActiveRecord
{

    public function checkProducts( array $prod)
    {
        if(!empty($prod)){
            //тут можно сделать например так, есть варианты и через query builder
            $query = 'SELECT * 
              FROM `table` 
             WHERE `id` IN (' . implode(',', array_map('intval', $prod)) . ')';
            //выполняем запрос
        }

        $r_data = array();
        $goods = ['tea','coffe','cacao'];
        $fails = 0;
        foreach($prod as $key=>$value){
            if(in_array($value, $goods)){
               $r_data['prods'][$value] = true;
            }else{
                $r_data['prods'][$value] = false;
                $fails++;
            }
        }
        $r_data['fails'] = $fails;
        return $r_data;
    }

    public function setShop(array $prods, $count, $id){
        if(!empty($prods)){
            //тут делаем insert'ы и в случае успеха возвращаем проверочный параметр
            return true;
        }
        return false;
    }

    public function checkCount($prod, $count)
    {
        $query = "select count(*) from dbo.products where name = {$prod} and count >= {$count}";
        //выполняем запрос
        $r_data = 1;
        return $r_data;
    }

}
