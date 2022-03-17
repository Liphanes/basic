<?php

/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = 'Покупки';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>Поздравляем Вас, <?php echo $this->params['info']['client']; ?>!</h2>

                <p>Ваш заказ №<?= $this->params['info']['id']; ?> был успешно зарезервирован.</p>
                <p>Детали заказа:</p>
                <p>Количество отсутствующих позиций в заказе - <?= $this->params['info']['prod']['fails'] ?></p>
                <p>Список блюд:</p>
                <?php
                      $tovars = $this->params['info']['prod']['prods'];
                      foreach($tovars as $key => $value){
                          $stat = $value != false ? 'блюдо в наличии' : 'блюдо отсутствует';
                          echo '<b>'.$key.'</b> - '.$stat.'<br>';
                      }

                ?>
                <p>Количество персон: <?php echo $this->params['info']['count']; ?> </p>
                <p>Для оформления нового заказа нажмите <a href="http://web<?php echo Yii::$app->getUrlManager()->createUrl(['cart/form']); ?>">Здесь</a></p>
            </div>
        </div>

    </div>
</div>
