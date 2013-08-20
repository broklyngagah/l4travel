<?php

namespace App\Modules\Coba;

use App\Modules\ModuleProvider;

class CobaServiceProvider extends ModuleProvider
{
	public function register()
	{
		parent::register('coba');
	}

	public function boot()
	{
		parent::boot('coba');
	}

} 