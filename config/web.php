<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Я вчу Yii2!',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'basic',
    'defaultRoute' => 'main/index',
    'language' => 'uk-UA',
    'charset'=> 'UTF-8',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'y6CPqRBqKgLjBGWC8qqmhmaSOq-Xtkf7',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing'=>true,
            'rules' => [
                [
                    'pattern' => '',
                    'route' => 'main/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'шукати-<search:\w+>-<year:\d{4}>',
                    'route' => 'main/search',
                    'suffix' => '.html'
                ],
                [
                    'pattern' => 'шукати-<search:\w+>',
                    'route' => 'main/search',
                    'suffix' => '.html'
                ],
                [
                    'pattern' => '<controller>/<action>/<id:\d+>',
                    'route' => '<controller>/<action>',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                    'suffix' => '.html'
                ],
                [
                    'pattern' => '<module>/<controller>/<action>/<id:\d+>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => '.html'
                ]
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
