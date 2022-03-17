<?php
/**@var app\models\CartForm $model*/
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin();
      $items = [
          'tea' => 'tea',
          'coffe' => 'coffe',
          'cacao'=>'cacao'
      ];
      $params = [
          'prompt' => 'Выберите продукт...'
      ];
?>
<?= $form->field($model, 'user') ?>
<?= $form->field($model, 'product')->dropDownList($items, $params) ?>
<?= $form->field($model, 'count') ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
