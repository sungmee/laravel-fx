<?php

namespace Sungmee\LaraFX;

interface GatewayInterface
{
    /**
     * 获取最新汇率
     *
     * @param   string  $base       汇率基础货币
     * @param   string  $symbols    需要查询的货币种类，多个种类用英文逗号隔开
	 * @param	int		$minutes	缓存时间，单位秒
     * @return  object
	 *
	 * Return Example
	 * stdClass Object (
	 * 	[base] => USD
	 * 	[date] => 2017-09-25
	 * 	[rates] => stdClass Object (
	 * 		[CNY] => 6.6233,
	 * 		[...] => ...
	 * 	)
	 * )
     */
	public function atm(string $base, string $symbols, int $minutes);
}