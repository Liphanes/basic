<?php
/**@var app\models\CartForm $model*/
/** @var $this yii\web\View  */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);

$css= <<< CSS

.row_del{
    display: none;  
}

CSS;

$this->registerCss($css, ["type" => "text/css"], "myStyles" );



$js = <<< JS
    jQuery(document).ready(function($) {
        
        
        $(document).on("click", ".row_add", function () {
            let parent = $(this).parent('.rows').parent();
            let block = parent.find('.rows').last();
            let cln = block.clone();
            cln.attr('data-item-id', +cln.attr("data-item-id") + 1);
            cln.val('');
            parent.append(cln);
             
             console.log($('.rows').length);
             for(let i = 1; i < $('.rows').length; i++){
                 $('[data-item-id =' + i + ']').find('.row_del').css('display','inline-block');
             }
             
    
        });
    
        $(document).on("click", ".row_del", function () {
            if(+$(this).parent('.rows').attr("data-item-id") != 0){
                let parent = $(this).parent('.rows');
                parent.remove();
            }
            
    
        });
    
    });
JS;
$position = $this::POS_READY;
$this->registerJs($js, $position);

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
<div class="rd">
    <div class="rows" data-item-id="0">
        <?= $form->field($model, 'product[]')->dropDownList($items, $params) ?>
        <input type="button" class="row_add" value="+"/> <input type="button" class="row_del" value="-"/>
    </div>
</div>

<?= $form->field($model, 'count') ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
