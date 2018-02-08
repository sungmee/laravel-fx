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
		$data = [
			'base' 	  => $base ?: $this->base,
			'symbols' => $symbols ?: $this->symbols
		];
		$minutes = $minutes ?: $this->minutes;
		$key 	 = "Fixer|$base|$symbols";

		return $data;

        // return Cache::remember($key, $minutes, function() use($data) {
        //         $res = Curl::to('https://api.fixer.io/latest')
		// 			->withData($data)
		// 			->asJson()
		// 			->get();

        //         return json_decode($res);
        // });
	}
}