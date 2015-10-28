<?php
/**
 * Created by PhpStorm.
 * User: olexandr
 * Date: 24.09.2015
 * Time: 23:49
 */

/*
 * @content string
 * @var $this \yii\web\view
 */

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use app\components\AlertWidget;

AppAsset::register($this);
$this->beginPage();

?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <?php $this->registerMetaTag(['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1']); ?>
    <title><?= Yii::$app->name; ?></title>
    <? $this->head(); ?>
</head>
<body>
<? $this->beginBody(); ?>

    <div class="wrap">

        <?php
        NavBar::begin(
            [
                'brandLabel'=>'Тестовий додаток'
            ]
        );



            echo Nav::widget([
                'items'=>[
                    [
                        'label'=>'Головна <span class="glyphicon glyphicon-home"></span>',
                        'url'=>['main/index']
                    ],
                    /*
                    '<li>
                        <a data-toggle="modal" data-target="#firstModalWindow">
                            перший перемкач
                        </a>
                    </li>',
                    */
                    [
                        'label' => 'другий перемикач <span class="glyphicon glyphicon-question-sign">',
                        'url' => ['#'],
                        'linkOptions'=>[
                            'data-toggle' => 'modal',
                            'data-target' => '#firstModalWindow',
                            'style' => 'cursor:pointer; outline: none;'
                        ]
                    ],

                    [
                        'label'=>'тут виадаючий список <span class="glyphicon glyphicon-inbox ">',
                        'items'=> [
                            '<li class="dropdown-header">Розширення</li>',
                            '<li class="divider"></li>',
                            [
                                'label'=>'переглянути',
                                'url'=>['widget-test/index']
                            ]

                        ]
                    ],
                    [
                        'label' => 'Залогінитись',
                        'url' => ['main/login']
                    ],
                    [
                        'label' => 'Реєстрація',
                        'url' => ['main/reg']
                    ],

                ],
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);

            Modal::begin([
                'header'=>'<h2>Модальне вікно</h2>',
                'id'=>'firstModalWindow'
            ]);
            echo 'То цеє, моє перше модальне віконечко на Їіі та бутсрапі :)';
            Modal::end();

            ActiveForm::begin([
                'action' => ['/шукати-'],
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
                ]

            ]);
            ?>

            <div class="input-group input-group-sm">
                <?php echo Html::input(
                    'type: search',
                    'search',
                    '',
                    [
                        'placeholder' => 'шо шукати?',
                        'class' => 'form-control'
                    ]
                );
                ?>

                <span class="input-group-btn">
                        <?php echo Html::submitButton(
                            '<span class="glyphicon glyphicon-search"></span>',
                            [
                                'class' => 'btn btn-success',
                                'onclick' => 'window.location.href = this.form.action + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html"'
                            ]
                        );
                        ?>
                    </span>
            </div>

            <?
            ActiveForm::end();

        NavBar::end();
        ?>
        <?= AlertWidget::widget(); ?>
        <div class="container">
            <?= $content ?>
        </div>

    </div>

    <footer class="footer">
        <div class="container">
            <span class="badge">
                <span class="glyphicon glyphicon-copyright-mark"></span> Me <?= date('D M Y')?>
            </span>
        </div>
    </footer>


<?php $this->endBody(); ?>
</body>
</html>

<?php $this->endPage(); ?>
