<?php

/** @var yii\web\View $this */

$this->title = 'Покупки';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>Ошибка</h2>

                <p>К сожалению данный товар закончился на складе.</p>
                <p>Для оформления нового заказа нажмите <a href="http://web<?php echo Yii::$app->getUrlManager()->createUrl(['cart/form']); ?>">Здесь</a></p>

            </div>
        </div>

    </div>
</div>
