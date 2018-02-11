<?php
/**
 * Created by PhpStorm.
 * User: guerosf
 * Date: 10.02.18
 * Time: 22:48
 */

/** @var \app\models\FormMath $model */

$form = \yii\widgets\ActiveForm::begin(['options' => ['id' => 'form_math', 'enctype' => "multipart/form-data"],]);
$js = <<<JS
$(document).ready(function () {
        $('#form_math').submit(function (e) {
           e.preventDefault();
           let data = new FormData($("#form_math")[0]);
            $.ajax({
                contentType: false,
                processData: false,
                type:'POST',
                data: data,
                url: "/",
                success: function (response) {
                    if (typeof response.result !=  "undefined"){
                        console.log(response.result);
                        $('#result_math').html(response.result);
                        $('#exampleModal').modal('show')
                    } 
                }
            });
        })
    })
JS;

$this->registerJs($js);

?>

<div class="row">
    <div class="col-sm-1 col-sm-offset-0"></div>
    <div class="col-sm-2">
        <?= $form->field($model, 'num1', ['enableAjaxValidation' => true])->input('number') ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'action')->dropDownList(\app\models\Actions::ACTIONS) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'num2', ['enableAjaxValidation' => true])->input('number') ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-1 col-sm-offset-2"></div>
    <div class="col-sm-2">
        <?= \yii\helpers\Html::submitButton('Посчитать', ['class' => 'btn btn-success', 'id' => 'btn-submit']) ?>
    </div>
</div>

<?php \yii\widgets\ActiveForm::end(); ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Результат вычисления</h5>
            </div>
            <div class="modal-body" id="result_math">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
