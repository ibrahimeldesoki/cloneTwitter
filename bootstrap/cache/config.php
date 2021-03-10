<?php

return [
    'app' => [
        'name'            => 'Laravel',
        'env'             => 'local',
        'debug'           => true,
        'url'             => 'http://localhost',
        'asset_url'       => null,
        'timezone'        => 'UTC',
        'locale'          => 'en',
        'fallback_locale' => 'en',
        'faker_locale'    => 'en_US',
        'key'             => 'base64:EoS0sLoLAQFrFvL3d9VcooTui9dNkwtUUKuyXVd9za0=',
        'cipher'          => 'AES-256-CBC',
        'providers'       => [
            0  => 'Illuminate\\Auth\\AuthServiceProvider',
            1  => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
            2  => 'Illuminate\\Bus\\BusServiceProvider',
            3  => 'Illuminate\\Cache\\CacheServiceProvider',
            4  => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
            5  => 'Illuminate\\Cookie\\CookieServiceProvider',
            6  => 'Illuminate\\Database\\DatabaseServiceProvider',
            7  => 'Illuminate\\Encryption\\EncryptionServiceProvider',
            8  => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
            9  => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
            10 => 'Illuminate\\Hashing\\HashServiceProvider',
            11 => 'Illuminate\\Mail\\MailServiceProvider',
            12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
            13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
            14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
            15 => 'Illuminate\\Queue\\QueueServiceProvider',
            16 => 'Illuminate\\Redis\\RedisServiceProvider',
            17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
            18 => 'Illuminate\\Session\\SessionServiceProvider',
            19 => 'Illuminate\\Translation\\TranslationServiceProvider',
            20 => 'Illuminate\\Validation\\ValidationServiceProvider',
            21 => 'Illuminate\\View\\ViewServiceProvider',
            22 => 'App\\Providers\\AppServiceProvider',
            23 => 'App\\Providers\\AuthServiceProvider',
            24 => 'App\\Providers\\EventServiceProvider',
            25 => 'App\\Providers\\RouteServiceProvider',
        ],
        'aliases' => [
            'App'          => 'Illuminate\\Support\\Facades\\App',
            'Arr'          => 'Illuminate\\Support\\Arr',
            'Artisan'      => 'Illuminate\\Support\\Facades\\Artisan',
            'Auth'         => 'Illuminate\\Support\\Facades\\Auth',
            'Blade'        => 'Illuminate\\Support\\Facades\\Blade',
            'Broadcast'    => 'Illuminate\\Support\\Facades\\Broadcast',
            'Bus'          => 'Illuminate\\Support\\Facades\\Bus',
            'Cache'        => 'Illuminate\\Support\\Facades\\Cache',
            'Config'       => 'Illuminate\\Support\\Facades\\Config',
            'Cookie'       => 'Illuminate\\Support\\Facades\\Cookie',
            'Crypt'        => 'Illuminate\\Support\\Facades\\Crypt',
            'DB'           => 'Illuminate\\Support\\Facades\\DB',
            'Eloquent'     => 'Illuminate\\Database\\Eloquent\\Model',
            'Event'        => 'Illuminate\\Support\\Facades\\Event',
            'File'         => 'Illuminate\\Support\\Facades\\File',
            'Gate'         => 'Illuminate\\Support\\Facades\\Gate',
            'Hash'         => 'Illuminate\\Support\\Facades\\Hash',
            'Http'         => 'Illuminate\\Support\\Facades\\Http',
            'Lang'         => 'Illuminate\\Support\\Facades\\Lang',
            'Log'          => 'Illuminate\\Support\\Facades\\Log',
            'Mail'         => 'Illuminate\\Support\\Facades\\Mail',
            'Notification' => 'Illuminate\\Support\\Facades\\Notification',
            'Password'     => 'Illuminate\\Support\\Facades\\Password',
            'Queue'        => 'Illuminate\\Support\\Facades\\Queue',
            'Redirect'     => 'Illuminate\\Support\\Facades\\Redirect',
            'Redis'        => 'Illuminate\\Support\\Facades\\Redis',
            'Request'      => 'Illuminate\\Support\\Facades\\Request',
            'Response'     => 'Illuminate\\Support\\Facades\\Response',
            'Route'        => 'Illuminate\\Support\\Facades\\Route',
            'Schema'       => 'Illuminate\\Support\\Facades\\Schema',
            'Session'      => 'Illuminate\\Support\\Facades\\Session',
            'Storage'      => 'Illuminate\\Support\\Facades\\Storage',
            'Str'          => 'Illuminate\\Support\\Str',
            'URL'          => 'Illuminate\\Support\\Facades\\URL',
            'Validator'    => 'Illuminate\\Support\\Facades\\Validator',
            'View'         => 'Illuminate\\Support\\Facades\\View',
        ],
    ],
    'auth' => [
        'defaults' => [
            'guard'     => 'web',
            'passwords' => 'users',
        ],
        'guards' => [
            'web' => [
                'driver'   => 'session',
                'provider' => 'users',
            ],
            'api' => [
                'driver'   => 'token',
                'provider' => 'users',
                'hash'     => false,
            ],
        ],
        'providers' => [
            'users' => [
                'driver' => 'eloquent',
                'model'  => 'App\\User',
            ],
        ],
        'passwords' => [
            'users' => [
                'provider' => 'users',
                'table'    => 'password_resets',
                'expire'   => 60,
                'throttle' => 60,
            ],
        ],
        'password_timeout' => 10800,
    ],
    'broadcasting' => [
        'default'     => 'log',
        'connections' => [
            'pusher' => [
                'driver'  => 'pusher',
                'key'     => '',
                'secret'  => '',
                'app_id'  => '',
                'options' => [
                    'cluster' => 'mt1',
                    'useTLS'  => true,
                ],
            ],
            'redis' => [
                'driver'     => 'redis',
                'connection' => 'default',
            ],
            'log' => [
                'driver' => 'log',
            ],
            'null' => [
                'driver' => 'null',
            ],
        ],
    ],
    'cache' => [
        'default' => 'file',
        'stores'  => [
            'apc' => [
                'driver' => 'apc',
            ],
            'array' => [
                'driver'    => 'array',
                'serialize' => false,
            ],
            'database' => [
                'driver'     => 'database',
                'table'      => 'cache',
                'connection' => null,
            ],
            'file' => [
                'driver' => 'file',
                'path'   => 'C:\\xampp\\htdocs\\Twitter\\storage\\framework/cache/data',
            ],
            'memcached' => [
                'driver'        => 'memcached',
                'persistent_id' => null,
                'sasl'          => [
                    0 => null,
                    1 => null,
                ],
                'options' => [
                ],
                'servers' => [
                    0 => [
                        'host'   => '127.0.0.1',
                        'port'   => 11211,
                        'weight' => 100,
                    ],
                ],
            ],
            'redis' => [
                'driver'     => 'redis',
                'connection' => 'cache',
            ],
            'dynamodb' => [
                'driver'   => 'dynamodb',
                'key'      => '',
                'secret'   => '',
                'region'   => 'us-east-1',
                'table'    => 'cache',
                'endpoint' => null,
            ],
        ],
        'prefix' => 'laravel_cache',
    ],
    'cors' => [
        'paths' => [
            0 => 'api/*',
        ],
        'allowed_methods' => [
            0 => '*',
        ],
        'allowed_origins' => [
            0 => '*',
        ],
        'allowed_origins_patterns' => [
        ],
        'allowed_headers' => [
            0 => '*',
        ],
        'exposed_headers' => [
        ],
        'max_age'              => 0,
        'supports_credentials' => false,
    ],
    'database' => [
        'default'     => 'mysql',
        'connections' => [
            'sqlite' => [
                'driver'                  => 'sqlite',
                'url'                     => null,
                'database'                => 'twitter',
                'prefix'                  => '',
                'foreign_key_constraints' => true,
            ],
            'mysql' => [
                'driver'         => 'mysql',
                'url'            => null,
                'host'           => '127.0.0.1',
                'port'           => '3306',
                'database'       => 'twitter',
                'username'       => 'root',
                'password'       => '',
                'unix_socket'    => '',
                'charset'        => 'utf8mb4',
                'collation'      => 'utf8mb4_unicode_ci',
                'prefix'         => '',
                'prefix_indexes' => true,
                'strict'         => true,
                'engine'         => null,
                'options'        => [
                ],
            ],
            'pgsql' => [
                'driver'         => 'pgsql',
                'url'            => null,
                'host'           => '127.0.0.1',
                'port'           => '3306',
                'database'       => 'twitter',
                'username'       => 'root',
                'password'       => '',
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'public',
                'sslmode'        => 'prefer',
            ],
            'sqlsrv' => [
                'driver'         => 'sqlsrv',
                'url'            => null,
                'host'           => '127.0.0.1',
                'port'           => '3306',
                'database'       => 'twitter',
                'username'       => 'root',
                'password'       => '',
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
            ],
        ],
        'migrations' => 'migrations',
        'redis'      => [
            'client'  => 'phpredis',
            'options' => [
                'cluster' => 'redis',
                'prefix'  => 'laravel_database_',
            ],
            'default' => [
                'url'      => null,
                'host'     => '127.0.0.1',
                'password' => null,
                'port'     => '6379',
                'database' => '0',
            ],
            'cache' => [
                'url'      => null,
                'host'     => '127.0.0.1',
                'password' => null,
                'port'     => '6379',
                'database' => '1',
            ],
        ],
    ],
    'filesystems' => [
        'default' => 'local',
        'cloud'   => 's3',
        'disks'   => [
            'local' => [
                'driver' => 'local',
                'root'   => 'C:\\xampp\\htdocs\\Twitter\\storage\\app',
            ],
            'public' => [
                'driver'     => 'local',
                'root'       => 'C:\\xampp\\htdocs\\Twitter\\storage\\app/public',
                'url'        => 'http://localhost/storage',
                'visibility' => 'public',
            ],
            's3' => [
                'driver'   => 's3',
                'key'      => '',
                'secret'   => '',
                'region'   => 'us-east-1',
                'bucket'   => '',
                'url'      => null,
                'endpoint' => null,
            ],
        ],
        'links' => [
            'C:\\xampp\\htdocs\\Twitter\\public\\storage' => 'C:\\xampp\\htdocs\\Twitter\\storage\\app/public',
        ],
    ],
    'hashing' => [
        'driver' => 'bcrypt',
        'bcrypt' => [
            'rounds' => 10,
        ],
        'argon' => [
            'memory'  => 1024,
            'threads' => 2,
            'time'    => 2,
        ],
    ],
    'logging' => [
        'default'  => 'stack',
        'channels' => [
            'stack' => [
                'driver'   => 'stack',
                'channels' => [
                    0 => 'single',
                ],
                'ignore_exceptions' => false,
            ],
            'single' => [
                'driver' => 'single',
                'path'   => 'C:\\xampp\\htdocs\\Twitter\\storage\\logs/laravel.log',
                'level'  => 'debug',
            ],
            'daily' => [
                'driver' => 'daily',
                'path'   => 'C:\\xampp\\htdocs\\Twitter\\storage\\logs/laravel.log',
                'level'  => 'debug',
                'days'   => 14,
            ],
            'slack' => [
                'driver'   => 'slack',
                'url'      => null,
                'username' => 'Laravel Log',
                'emoji'    => ':boom:',
                'level'    => 'critical',
            ],
            'papertrail' => [
                'driver'       => 'monolog',
                'level'        => 'debug',
                'handler'      => 'Monolog\\Handler\\SyslogUdpHandler',
                'handler_with' => [
                    'host' => null,
                    'port' => null,
                ],
            ],
            'stderr' => [
                'driver'    => 'monolog',
                'handler'   => 'Monolog\\Handler\\StreamHandler',
                'formatter' => null,
                'with'      => [
                    'stream' => 'php://stderr',
                ],
            ],
            'syslog' => [
                'driver' => 'syslog',
                'level'  => 'debug',
            ],
            'errorlog' => [
                'driver' => 'errorlog',
                'level'  => 'debug',
            ],
            'null' => [
                'driver'  => 'monolog',
                'handler' => 'Monolog\\Handler\\NullHandler',
            ],
            'emergency' => [
                'path' => 'C:\\xampp\\htdocs\\Twitter\\storage\\logs/laravel.log',
            ],
        ],
    ],
    'mail' => [
        'default' => 'smtp',
        'mailers' => [
            'smtp' => [
                'transport'  => 'smtp',
                'host'       => 'smtp.mailtrap.io',
                'port'       => '2525',
                'encryption' => null,
                'username'   => null,
                'password'   => null,
                'timeout'    => null,
                'auth_mode'  => null,
            ],
            'ses' => [
                'transport' => 'ses',
            ],
            'mailgun' => [
                'transport' => 'mailgun',
            ],
            'postmark' => [
                'transport' => 'postmark',
            ],
            'sendmail' => [
                'transport' => 'sendmail',
                'path'      => '/usr/sbin/sendmail -bs',
            ],
            'log' => [
                'transport' => 'log',
                'channel'   => null,
            ],
            'array' => [
                'transport' => 'array',
            ],
        ],
        'from' => [
            'address' => null,
            'name'    => 'Laravel',
        ],
        'markdown' => [
            'theme' => 'default',
            'paths' => [
                0 => 'C:\\xampp\\htdocs\\Twitter\\resources\\views/vendor/mail',
            ],
        ],
    ],
    'queue' => [
        'default'     => 'sync',
        'connections' => [
            'sync' => [
                'driver' => 'sync',
            ],
            'database' => [
                'driver'      => 'database',
                'table'       => 'jobs',
                'queue'       => 'default',
                'retry_after' => 90,
            ],
            'beanstalkd' => [
                'driver'      => 'beanstalkd',
                'host'        => 'localhost',
                'queue'       => 'default',
                'retry_after' => 90,
                'block_for'   => 0,
            ],
            'sqs' => [
                'driver' => 'sqs',
                'key'    => '',
                'secret' => '',
                'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
                'queue'  => 'your-queue-name',
                'suffix' => null,
                'region' => 'us-east-1',
            ],
            'redis' => [
                'driver'      => 'redis',
                'connection'  => 'default',
                'queue'       => 'default',
                'retry_after' => 90,
                'block_for'   => null,
            ],
        ],
        'failed' => [
            'driver'   => 'database',
            'database' => 'mysql',
            'table'    => 'failed_jobs',
        ],
    ],
    'services' => [
        'mailgun' => [
            'domain'   => null,
            'secret'   => null,
            'endpoint' => 'api.mailgun.net',
        ],
        'postmark' => [
            'token' => null,
        ],
        'ses' => [
            'key'    => '',
            'secret' => '',
            'region' => 'us-east-1',
        ],
    ],
    'session' => [
        'driver'          => 'file',
        'lifetime'        => '120',
        'expire_on_close' => false,
        'encrypt'         => false,
        'files'           => 'C:\\xampp\\htdocs\\Twitter\\storage\\framework/sessions',
        'connection'      => null,
        'table'           => 'sessions',
        'store'           => null,
        'lottery'         => [
            0 => 2,
            1 => 100,
        ],
        'cookie'    => 'laravel_session',
        'path'      => '/',
        'domain'    => null,
        'secure'    => null,
        'http_only' => true,
        'same_site' => 'lax',
    ],
    'view' => [
        'paths' => [
            0 => 'C:\\xampp\\htdocs\\Twitter\\resources\\views',
        ],
        'compiled' => 'C:\\xampp\\htdocs\\Twitter\\storage\\framework\\views',
    ],
    'trustedproxy' => [
        'proxies' => null,
        'headers' => 94,
    ],
    'tinker' => [
        'commands' => [
        ],
        'alias' => [
        ],
        'dont_alias' => [
            0 => 'App\\Nova',
        ],
    ],
];
