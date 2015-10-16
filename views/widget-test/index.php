<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
?>
<h1>widget-test/index</h1>

<?php

echo Html::a(
    'передати ід=777',
    Url::to([ 'widget-test/index', 'id' => '777' ])

);
?>
<br/>
<?
echo Html::a(
    'Шукати статті за 2015 рік',
    Url::to([
        'main/search',
        'search' => 'стаття',
        'year' => '2015'
    ])
);

if (isset($_GET['id']))
    echo '<br/>була передана ід:  <b>'.$_GET['id'].'</b>';

?>

