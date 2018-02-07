# Laravel Foreign exchange

Laravel Foreign exchange Package.

## 安装

在 Laravel 项目根目录的 composer.json 文件的 `require` 中加入 `"Sungmee/laravel-fx": "dev-master",`，然后命令行运行 `composer update`。

就这些了。

## 使用

```php
// 查询汇率
$base    = 'USD';
$symbols = 'CNY,JPY';
$minutes = 60;
\Fx::atm($base, $symbols, $minutes);

// 货币兑换
$money = 100;
\Fx::usd2cny(100);
\Fx::usd2jpy(100);
...

// 更改默认变量
\Fx::setBase('CNY');
\Fx::setSymbols('USD');
...

// 更改默认查询网关
\Fx::gateway('Fixer')->atm();
```

## 扩展网关

在 \Sungmee\LaraFx\Gateways 下新增网关，需要 继承 Fx 类和 GatewayInterface 接口。