<?php

namespace App\Modules\Coba\Controllers;

use App\Controllers\BaseController;
use View;

class CobaController extends BaseController
{

	public function getIndex()
	{
		return View::make('coba::index');
	}

}