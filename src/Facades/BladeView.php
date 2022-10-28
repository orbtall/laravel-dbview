<?php namespace Orbtall\Blade\Compiler\Facades;

use Illuminate\Support\Facades\Facade;

class BladeView extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {
        return 'bladeview';
    }

}