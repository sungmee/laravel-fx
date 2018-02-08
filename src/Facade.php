<?php

namespace Sungmee\LaraFX;

use Illuminate\Support\Facades\Facade as LF;

class Facade extends LF {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FX';
    }
}