<?php

namespace Sungmee\LaraFx;

use Illuminate\Support\Facades\Facade as LF;

class Facade extends LF {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Fx';
    }
}