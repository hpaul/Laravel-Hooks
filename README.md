# Hook

Some reutilizable blocks inspired by wordpress

## Installation

### Aritsan

	php artisan bundle:install hook

### Bundle Registration

Add the following to your **application/bundles.php** file:

	'hook' => array(
		'autoloads' => array(
			'map' => array(
				'Hook' => '(:bundle)/hook.php',
			),
		),
	),


## Usage

You can bind a hook wherever you want, but I build this esspecialy for views

If preffer to use a helper, like me, in your **laravel/helpers.php** put this:

	/**
	 * Bind a hook
	 *
	 * @param  string  $name
	 * @return bool
	 */
	function hook($name)
	{
		return Hook::bind($name);
	}

So now you can use hook('header') in your views and for adding a hook use this:

	Hook::add('header', function(){
		echo '<meta name="description" content="Hooks" />';
	});