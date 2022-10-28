<?php namespace Orbtall\Blade\Compiler;

use Illuminate\View\Engines\CompilerEngine as Engine;

class CompilerEngine extends Engine {
    /**
     * DbBladeCompilerEngine constructor.
     *
     * @param Compiler $bladeCompiler
     */
    public function __construct(Compiler $compiler) {
        parent::__construct($compiler);
    }
}
