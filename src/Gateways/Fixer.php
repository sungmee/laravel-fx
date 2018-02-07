<?php

namespace Sungmee\LaraFx\Gateways;

use Sungmee\LaraFx\Fx;
use Ixudra\Curl\Facades\Curl;
use ungmee\LaraFx\GatewayInterface;
use Illuminate\Support\Facades\Cache;

class Fixer extends Fx implements GatewayInterface
{
	public function atm(string $base = null, string $symbols = null, int $minutes = null)
	{
		$base 	 = $base ?: $this->base;
		$symbols = $symbols ?: $this->symbols;
		$minutes = $minutes ?: $this->minutes;
		$key 	 = "Fixer|$base|$symbols";

        return Cache::remember($key, $minutes, function() use($base, $symbols) {
                $data = [
					'base' 	  => $base,
					'symbols' => $symbols
				];

				$res = Curl::to('https://api.fixer.io/latest')
					->withData($data)
					->asJson()
					->get();

                return json_decode($res);
        });
	}
}