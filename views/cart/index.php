<?php

/** @var yii\web\View $this */

$this->title = 'Покупки';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-4">
                <h2>Заголовок</h2>

                <p>Интерфейс покупок.</p>
                <p>Для оформления нового заказа нажмите <a href="http://web<?php echo Yii::$app->getUrlManager()->createUrl(['cart/form']); ?>">Здесь</a></p>

            </div>
        </div>

    </div>
</div>
