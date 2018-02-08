<?php

namespace Sungmee\LaraFX\Gateways;

use Sungmee\LaraFX\FX;
use Ixudra\Curl\Facades\Curl;
use Sungmee\LaraFX\GatewayInterface;
use Illuminate\Support\Facades\Cache;

class Fixer extends FX implements GatewayInterface
{
	public function atm(string $base = null, string $symbols = null, int $minutes = null)
	{
		$data = ['base' => $base ?: $this->base];

		if (!empty($symbols))
			$data['symbols'] = $symbols;
		elseif (!empty($this->symbols))
			$data['symbols'] = $this->symbols;

		$minutes = $minutes ?: $this->minutes;
		$key 	 = "Fixer|$base|$symbols";

        return Cache::remember($key, $minutes, function() use($data) {
                return Curl::to('https://api.fixer.io/latest')
					->withData($data)
					->asJson()
					->get();
        });
	}
}