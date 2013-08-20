<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;
use View;

/**
 * @package App\Modules
 */
class ModuleProvider extends ServiceProvider
{
	/**
     * @property string $modulePath
	 */
	private $modulePath;

	/**
	 * function for booting modules
     * @return void
	 */
	public function boot()
	{
		if($module = $this->getModule(func_get_args())) {
			$this->modulePath = app_path() . '/modules/' . $module;

			$this->package('app/', $module, $module, $this->modulePath);
		}
	}

	/**
	 * register all module and all default Illuminate ServiceProvider
     * @return void
	 */
	public function register()
	{
		if ($module = $this->getModule(func_get_args())) {
			
			$this->modulePath = app_path() . '/modules/' . $module;

            $this->app['config']->package('app/' . $module, app_path() . '/modules/' . $module . '/config');

            // Add routes
            $routes = app_path() . '/modules/' . $module . '/routes.php';
            if (file_exists($routes)) {
                require $routes;
            }

        	// Add view location	
        	View::addNamespace($module, $this->modulePath . '/views');
        }
	}

	/**
	 * get module name
     * @return string
	 */
	public function getModule($arg)
	{
		$module = ( isset($arg[0]) and is_string($arg[0]) ) ? $arg[0] : null;
		return $module; 
	}

} 