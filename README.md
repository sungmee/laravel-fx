# Laravel Foreign exchange

Laravel Foreign exchange Package.

## 安装

命令行到 Laravel 项目根目录然后：

> composer require sungmee/laravel-fx

### Laravel v5.5 以上版本的安装就这些了。

### Laravel 5.5 以下版本还要继续操作：

然后在 Laravel 配置文件 `config/app.php` 中加入：

```PHP
'providers' => [
    Sungmee\LaraFX\ServiceProvider::class,
]

'aliases' => [
    'FX' => Sungmee\LaraFX\Facade::class,
]
```

## 使用

```php
// 查询汇率
$base    = 'USD';
$symbols = 'CNY,JPY';
$minutes = 60;
\FX::atm($base, $symbols, $minutes);

// 货币兑换
$money = 100;
\FX::usd2cny(100);
\FX::usd2jpy(100);
...

// 更改默认变量
\FX::setBase('CNY');
\FX::setSymbols('USD');
...

// 更改默认查询网关
\FX::gateway('Fixer')->atm();
```

## 扩展网关

在 \Sungmee\LaraFX\Gateways 下新增网关，需要 继承 Fx 类和 GatewayInterface 接口。