## How to Use

1. git clone https://github.com/rajivseelam/laravel-queues.git
2. Run: `cd laravel-queues`
3. Run: `composer install`
4. Go to app/config/database.php and put database credentials

                'mysql' => array(
                	'driver'    => 'mysql',
                	'host'      => 'localhost',
                	'database'  => 'database',
                	'username'  => 'root',
                	'password'  => '',
                	'charset'   => 'utf8',
                	'collation' => 'utf8_unicode_ci',
                	'prefix'    => '',
                ),

5. Go to http://www.iron.io and register/login.
6. Create a project and grab your Project ID and Token.
7. Go to app/config/queue.php and put project-id and token

    	'iron' => array(
			'driver'  => 'iron',
			'host'    => 'mq-aws-us-east-1.iron.io',
			'token'   => 'token',
			'project' => 'project_id',
			'queue'   => 'laravel',
		),

8. Run: `php artisan migrate:install`
9. Run: `php artisan migrate`
10. Subscribe to the queue. Please mention the correct url where you hosted your code. Run: `php artisan queue:subscribe laravel http://mywebsite.com/queue/receive`


