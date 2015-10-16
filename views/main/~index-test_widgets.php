<?php
use app\components\FirstWidget;
use \app\components\SecondWidget;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;

/* @var $this yii\web\View */

//$this->registerJsFile('@web/js/main-index.js', [ 'position'=>\yii\web\View::POS_HEAD ], 'main-index');
//$this->registerJs('console.log("YEPPY!")', $this::POS_LOAD, 'console msg');
//
//$this->registerCssFile('@web/css/main.css',[], 'main.css');
//$this->registerCss('body{ background: #0ff; }');

?>
<h1>main/index</h1>

<p>
    <?=$hello?>
</p>
<?= FirstWidget::widget(
    [
        'a'=>15,
        'b'=>113
    ]
);?>

<?php
echo DatePicker::widget([
'attribute' => 'from_date',
//'language' => 'ru',
//'dateFormat' => 'yyyy-MM-dd',
]);
?>

<?php SecondWidget::begin() ?>

    Цей тест зробимо синім.

<?php SecondWidget::end() ?>

<?php Modal::begin([
'header' => '<h2>Великий напис зверху</h2>',
'toggleButton' => ['label' => 'тицьни мене!'],
]);?>

модальне віконечко :)

<?php Modal::end(); ?>
