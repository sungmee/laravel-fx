<?php

namespace Sungmee\LaraFx;

class Fx
{
	/**
	 * 汇率基础货币
	 *
	 * @var string
	 */
	public $base = 'USD';

	/**
	 * 需要查询的货币种类，多个种类用英文逗号隔开
	 *
	 * @var string
	 */
	public $symbols = 'CNY';

	/**
	 * 缓存时间，单位秒
	 *
	 * @var int
	 */
	public $minutes = 60;

	/**
	 * 初始化网关，默认 Fixer.io
	 *
	 * @return $this
	 */
	public function __construct()
    {
		return new Gateways\Fixer;
	}

    /**
     * 未定义方法
     *
     * @param  string	$name	方法名称
	 * @param  array	$agrs	参数
	 * @return mix
     */
	public function __call($name, $args)
    {
		// 货币兑换，如 usd2cny(100) 为 100 美元对人民币
        $field = preg_match('/^([a-z]{3})2([a-z]{3})/', $name, $matches);
        if ($field && count($matches) === 3) {
			$base   = strtoupper($matches[1]);
			$symbol = strtoupper($matches[2]);
			$rate   = $this->atm($base, $symbol)->rates->$symbol;
			return (double)$args[0] * $rate;
        }

        $field = preg_match('/^get(\w+)/', $name, $matches);
        if ($field && $matches[1]) {
            $variableName = strtolower($matches[1]);
            return $this->$variableName;
        }

        $field = preg_match('/^set(\w+)/', $name, $matches);
        if ($field && $matches[1]) {
            $variableName = strtolower($matches[1]);
            $this->$variableName = $args[0];
            return $this;
		}
	}

	/**
	 * 更改汇率查询网关
	 *
	 * @param  string $gateway	网关名称字符串
	 * @return $this
	 */
	public function gateway(string $gateway)
	{
		$gateway = "Gateways\\$gateway";
		return new $gateway;
	}
}