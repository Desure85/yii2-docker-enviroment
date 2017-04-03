<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'bootstrap'    => [
        'assetsAutoCompress','debug','gii','log'
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=172.17.0.1;dbname=test;port=3306',
            'username' => 'root',
            'password' => '12345',
            'charset' => 'utf8',
//            'slaveConfig' => [
//                'username' => 'root',
//                'password' => '12345',
//                'charset'  => 'utf8',
//                'attributes' => [
//                    PDO::ATTR_TIMEOUT => 10,
//                ],
//            ],
//            'slaves' => [
//                ['dsn' => 'mysql:host=127.0.0.1;dbname=test;port=3306'],
//            ],
//            'enableSchemaCache' => true,
//            'schemaCache' => 'cache',
//            'schemaCacheDuration' => 7200,
//            'enableQueryCache' => true,
//            'queryCache' => 'cache',
//            'queryCacheDuration' => 10,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.yandex.ru',
//                'username' => 'mail.yandex.yandex',
//                'password' => 'yandex',
//                'port' => '465',
//                'encryption' => 'ssl',
//            ],
        ],
        'assetsAutoCompress' =>
            [
                'class'             => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
                'enabled'           => TRUE,
                'jsCompress'        => true,
                'cssFileCompile'    => true,
                'jsFileCompile'     => true,
                'cssFileBottomLoadOnJs' => false,
                'jsCompressFlaggedComments' => true,
                'cssFileBottom' => false,
                'jsFileCompressFlaggedComments' => true
            ],
        'cache' => [
            //'class' => 'yii\redis\Cache',
            //'class' => 'yii\caching\DummyCache',
            'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\ApcCache',
            //'useApcu' => true
        ],
        'session' => [
            'class' => 'yii\web\CacheSession',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => [
                'user',
                'admin'
            ],
        ],
        'user' => [
            'class' => 'yii\web\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' =>[
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
//        'redis' => [
//            'class' => 'yii\redis\Connection',
//            'hostname'     => '127.0.0.1',
//            'port'     => '6379',
//            'password' => 'foobared',
//            'database' => 10,
//            //'socketClientFlags' => STREAM_CLIENT_CONNECT
//        ],
    ],
    'modules'=>[
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs'=> ['*']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs'=> ['*'],
        ],
    ],
    'params' => $params,
];
