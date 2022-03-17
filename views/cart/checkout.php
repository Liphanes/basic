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

                <p>Ваш заказ был успешно зарезервирован.</p>
                <p>Детали заказа</p>
                <p>Наименование: <?php echo $this->params['info']['prod']; ?> </p>
                <p>Количество: <?php echo $this->params['info']['count']; ?> </p>
                <p>Для оформления нового заказа нажмите <a href="http://web<?php echo Yii::$app->getUrlManager()->createUrl(['cart/form']); ?>">Здесь</a></p>
            </div>
        </div>

    </div>
</div>
