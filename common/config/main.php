<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'zh-CN',//默认语言
    'timeZone' => 'Asia/Shanghai',//默认时区
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['queue', 'debug'],
    'modules' => [
        'debug' => [
            'class' => 'yii\\debug\\Module',
            'panels' => [
                'elasticsearch' => [
                    'class' => 'yii\\elasticsearch\\DebugPanel',
                ],
            ],
        ],
    ],
    'components' => [
        'cache' => [
            // File
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@frontend/runtime/runtime',

            /*// Apc
            'class' => 'yii\caching\ApcCache',
            'keyPrefix' => 'apc_', // 唯一键前缀*/

            /*// XCache
            'class' => 'yii\caching\XCache',
            'keyPrefix' => 'XCache_', // 唯一键前缀*/

            /*// MemCache
            'class' => 'yii\caching\MemCache',
            'keyPrefix' => 'memcache_',
            'servers' => [
                [
                    'host' => 'localhost',
                    'port' => 11211,
                ]
            ],*/

            /*'class' => 'yii\redis\Cache',
            'keyPrefix' => 'redis_',*/
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        /*'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
            'redis' => 'redis', // 连接组件或它的配置
            'channel' => 'queue', // Queue channel key
        ],*/
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // DB 连接组件或它的配置
            'tableName' => '{{%queue}}', // 表名
            'channel' => 'default', // Queue channel key
            'mutex' => \yii\mutex\MysqlMutex::class, // Mutex that used to sync queries
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // 这个要设置为false,才会真正的发邮件
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'username' => '798314049@qq.com',
                'password' => 'ocoxnzwjvpcgbfcf',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['798314049@qq.com'=>'客服名称']
            ],
        ],


    ],
];
