<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
            <title>
                <?= Html::encode($this->title) ?>
            </title>
            <?php $this->head() ?>
        <link rel="stylesheet" href="http://openlayers.org/en/v3.2.1/css/ol.css" type="text/css">

        <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
         <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://openlayers.org/en/v3.2.1/build/ol.js" type="text/javascript"></script>
    <style>
      .ol-popup {
        position: absolute;
        background-color: white;
        -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 280px;
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
      }
      .ol-popup-closer:after {
        content: "✖";
      }
    </style>

    </head>

    <body class="login-page">

        <?php $this->beginBody() ?>
        <div class="container-fluid">
            <div align="center" class="page-header">

                <h1>WEB GIS
                    <font color="navy"> D E P O K</font>
                </h1>

                <h4>Layanan terpadu pemetaan wilayah Depok</h3>

            </div>


        </div>

        <?= $content ?>

            <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>