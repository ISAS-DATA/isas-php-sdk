# ISAS Official SDK for PHP

[![Latest Stable Version](https://img.shields.io/packagist/v/isas/php-sdk.svg?style=flat-square)](https://packagist.org/packages/isas/php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/isas/php-sdk.svg?style=flat-square)](https://packagist.org/packages/isas/php-sdk)
[![License](https://img.shields.io/packagist/l/isas/php-sdk.svg?style=flat-square)](https://packagist.org/packages/isas/php-sdk)
[![PHP Version Require](https://img.shields.io/packagist/php-v/isas/php-sdk.svg?style=flat-square)](https://packagist.org/packages/isas/php-sdk)

欢迎使用 ISAS起零数据（[https://api.istero.com](https://api.istero.com)）官方 PHP SDK。本 SDK 采用现代化设计模式，专为多语言矩阵生态设计，具备高性能、**零命名空间污染** 及强类型依赖特征，适用于： Laravel / ThinkPHP 6.x 8.x / Hyperf / Symfony / Yii2 / Slim / CodeIgniter4 等主流 PHP 框架及原生 PHP 项目。

---

## ✨ 核心特性

- **🚀 高级动态工厂模式**：全局仅需引入一个“Client”入口，所有子服务链式直达，开发者无需声明臃肿的use头部，让代码更简洁清爽。同时我们也保留了独立服务实例调用的方式，满足不同的开发习惯。
- **🔒 安全与密钥隔离**：全面移除硬编码风险，采用构造函数动态注入凭证，完美支持环境变量配置，让您的 API 密钥安全可控，从源头避免密钥泄漏的安全隐患。
- **⚡ 按需延迟加载 (Lazy Loading)**：完全符合 PSR-4 规范，未调用的组件绝不加载，即使面对平台海量的扩展能力，也能保持零内存浪费，完全不会影响您原有项目的性能表现。
- **🛠 健壮的异常捕获**：内置完整的错误拦截机制，统一处理网络异常、参数错误、服务调用异常等各类问题，提供优雅的调试体验，帮您快速定位问题，减少排错时间。
- **🛡️ 内置动态签名算法**：SDK原生封装了平台标准化的动态签名逻辑，开发者无需手动编写复杂的签名校验与加密计算代码，开箱即用，彻底告别对接时的签名调试痛点，大幅降低对接成本。
---

## 📂 项目目录规范

```text
isas-php-sdk/
├── src/                      # 核心源码目录 (符合 PSR-4 自动加载标准)
│   ├── Exception/            # SDK 异常处理体系目录
│   │   ├── IsasException.php     # SDK 基础异常类 (全局总异常拦截门面)
│   │   ├── NetworkException.php  # 网络层传输异常类 (cURL超时、DNS故障等)
│   │   └── ServiceException.php  # 应用层业务异常类 (HTTP状态码非200、接口报错)
│   ├── Services/             # 开放能力原子组件目录
│   │   ├── Ai.php                # AI/人工智能相关服务能力组件
│   │   ├── Develop.php           # 研发辅助类相关服务能力组件
│   │   ├── Health.php            # 健康管理相关服务能力组件
│   │   ├── HotRank.php           # 热点/热搜榜相关服务能力组件
│   │   ├── News.php              # 新闻类相关服务能力组件
│   │   ├── Tools.php             # 综合工具相关服务能力组件
│   │   └── Web.php               # 网站相关服务能力组件
│   ├── BaseService.php       # 组件抽象抽象基类 (声明基础构造与生命周期)
│   └── Client.php            # SDK 核心入口客户端 (实现多组件全自动代理路由)
├── .gitignore                # Git 版本控制忽略配置文件
├── LICENSE                   # 开源授权协议文件 (MIT License)
├── README.md                 # SDK 技术框架与接口说明文档
├── composer.json             # Composer 依赖包与自动加载配置文件
└── demo.php                  # 根目录快速入门与异常调试示例

---

## 📦 完整源码清单 (Source Code)

### 1. `composer.json` (包配置文件)

```json
{
    "name": "isas/php-sdk",
    "description": "ISAS API SDK for PHP",
    "type": "library",
    "license": "MIT",
    "require": {
        "php": ">=8.0",
        "ext-curl": "*",
        "ext-json": "*"
    },
    "autoload": {
        "psr-4": {
            "Isas\\Sdk\\": "src/"
        }
    }
}

```

### 2. `src/Client.php` (核心总入口)

```php
<?php
/**
 * 功能说明：项目公共配置 / 核心文件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @version 1.1.0
 * @copyright © 2024-2026 ISAS-DATA
 * @license MIT License
 *
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk;

use Isas\Sdk\Exception\IsasException;
use Isas\Sdk\Exception\NetworkException;
use Isas\Sdk\Exception\ServiceException;

class Client
{
    private $token;
    private $appSecret;
    private $baseUrl;

    public function __construct(string $token = '', string $appSecret = '')
    {
        // 基础参数强校验
        if (empty($token)) {
            throw new IsasException("初始化失败: 缺少必要的 'token' 参数。");
        }

        $this->token = $token;
        $this->appSecret = $appSecret;
        $this->baseUrl = "https://api.istero.com";
    }

    /**
     * 执行 API 请求
     * * @param string $method 请求方式 GET/POST
     * @param string $path 路由路径
     * @param array $bizParams 业务参数
     * @return array
     * * @throws NetworkException 当底层网络通讯失败时抛出
     * @throws ServiceException 当后端服务返回非 200 状态码或业务逻辑错误时抛出
     */
    public function execute($method, $path, array $bizParams = [])
    {
        $method = strtoupper($method);
        $url = $this->baseUrl . '/' . ltrim($path, '/');
        $timestamp = time();
        $nonce = substr(uniqid(mt_rand(), true), 0, 16);

        // === 1. 签名计算 ===
        if ($this->appSecret) {
            $filteredParams = array_filter($bizParams, function ($val) {
                return $val !== '' && $val !== null && !is_array($val);
            });
            ksort($filteredParams);
            $paramStr = '';
            foreach ($filteredParams as $k => $v) {
                $paramStr .= $k . '=' . $v . '&';
            }
            $paramStr = rtrim($paramStr, '&');
            $signSrc = $this->token . $this->appSecret . $timestamp . $nonce . $paramStr;
            $signature = hash('sha256', $signSrc);
            $headers = [
                'Accept: application/json',
                'Authorization: Bearer ' . $this->token,
                'X-Signature: ' . $signature,
                'X-Timestamp: ' . $timestamp,
                'X-Nonce: ' . $nonce
            ];
        } else {
            $headers = [
                'Accept: application/json',
                'Authorization: Bearer ' . $this->token,
            ];
        }

        // === 2. cURL 请求与异常拦截 ===
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 生产环境建议开启并配置证书

        if ($method === 'GET') {
            if (!empty($bizParams)) {
                $url .= '?' . http_build_query($bizParams);
            }
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $bizParams);
        }

        $response = curl_exec($ch);

        // 拦截 A：网络/通讯层错误拦截
        if ($response === false) {
            $curlError = curl_error($ch);
            $curlErrno = curl_errno($ch);
            curl_close($ch);
            throw new NetworkException("SDK 网络请求失败: [{$curlErrno}] {$curlError}", $curlErrno);
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // 拦截 B：HTTP 状态码及响应内容解析
        $result = json_decode($response, true);

        // 如果不是 200 响应，直接视为服务调用异常
        if ($httpCode !== 200) {
            $errorMsg = isset($result['message']) ? $result['message'] : '未知服务错误';
            $errorCode = isset($result['code']) ? $result['code'] : $httpCode;

            throw new ServiceException(
                "ISAS 服务调用异常 (HTTP {$httpCode}): {$errorMsg}",
                $errorCode,
                $httpCode,
                $response
            );
        }

        // 拦截 C：返回的虽然是 200，但业务 JSON 无法解析（服务链路异常导致吐出 HTML 报错页等）
        if ($result === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new ServiceException(
                "SDK 解析响应 JSON 失败，可能服务发生严重系统故障。",
                500,
                $httpCode,
                $response
            );
        }

        return $result;
    }

    public function __call($name, $arguments)
    {
        $className = ucfirst($name);
        $fullClass = "Isas\\Sdk\\Services\\" . $className;
        if (class_exists($fullClass)) {
            return new $fullClass($this);
        }
        // 拦截 D：调用不存在的子组件异常
        throw new \BadMethodCallException("ISAS SDK 暂不支持该子服务组件: {$name}");
    }
}

```

### 3. `src/BaseService.php` (强类型基类)

```php
<?php

namespace Isas\Sdk;

/**
 * 抽象服务基类
 */
abstract class BaseService
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * 强类型依赖注入，禁止传递空客户端
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}

```

### 4. `src/Services/Develop.php` (业务能力示例)

```php
<?php

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Develop extends BaseService
{
   /**
     * https://api.istero.com/service/doc/smtp-email-service
     * SMTP邮件发送服务
     * @param string $host 邮件服务器（必填）
     * @param string $username 邮箱登录用户名（必填）
     * @param string $password 邮箱密码/授权码（必填）
     * @param string $from_address 发件邮箱（必填）
     * @param string $from_name 发件人名称（必填）
     * @param string $subject 邮件标题（必填）
     * @param string $body 邮件内容（支持HTML，必填）
     * @param string $to_address 收件邮箱（必填）
     * @param string $encryption 加密方式，可选ssl（可选）
     * @param int $port 端口号，默认25，可选465（可选）
     * @return array API 返回的 JSON 数组
     */
    public function sendSmtpEmail($host, $username, $password, $from_address, $from_name, $subject, $body, $to_address, $encryption = '', $port = 25)
    {
        $path = '/resource/v1/email/send';
        $params = [
            'host' => (string)$host,
            'username' => (string)$username,
            'password' => (string)$password,
            'from_address' => (string)$from_address,
            'from_name' => (string)$from_name,
            'subject' => (string)$subject,
            'body' => (string)$body,
            'to_address' => (string)$to_address,
            'port' => (int)$port
        ];

        if (!empty($encryption)) {
            $params['encryption'] = (string)$encryption;
        }

        return $this->client->execute('POST', $path, $params);
    }
}

```

---

## 🛠️ 安装指南

在您的项目根目录下，使用 Composer 进行标准安装：

```bash
composer require isas/php-sdk

```

---

## 🚀 快速上手 (Quick Start)

您无需单独 `use` 各种子能力类，只需对总入口 `Client` 赋予别名即可顺畅调用所有子服务。

创建一个 `demo.php` 并运行：

```php
<?php

/**
 * ISAS 官方 PHP-SDK 调用示例
 *
 * 运行本示例前，请确保：
 * 1. 已在项目根目录运行 `composer require isas/php-sdk` 引入依赖
 * 2. 已经在代码中引入了 Composer 的自动加载文件 (`vendor/autoload.php`)
 */

// 1. 引入 Composer 自动加载机制
require_once __DIR__ . '/vendor/autoload.php';

// 2. 引入 ISAS SDK 核心客户端类（引入别名以规避命名空间冲突）
use Isas\Sdk\Client as IsasSdk;
use Isas\Sdk\Exception\IsasException;
use Isas\Sdk\Exception\NetworkException;
use Isas\Sdk\Exception\ServiceException;

echo "==================================================\n";
echo "         ISAS 官方 SDK 接口调用演示开始\n";
echo "==================================================\n\n";

/**
 * 步骤一：初始化客户端实例
 * 配置在 ISAS 开放平台申请的身份凭证（Token 与 AppSecret）
 */
$token = 'YOUR_API_TOKEN';       // 开发者访问令牌
$appSecret = 'YOUR_APP_SECRET';  // 签名密钥（若未启用动态签名服务，此参数可传入空字符串）

try {
    // 实例化核心通信客户端（若 Token 为空，此处将触发客户端初始化异常）
    $isas = new IsasSdk($token, $appSecret);

    // ==================================================
    // 示例：调用 UUID 批量生成服务
    // ==================================================
    echo "正在发起 UUID 批量生成服务请求...\n";

    // 【调用方式 1】：基于动态代理魔术方法（__call）实现子服务路由切换
    $uuidResponse = $isas->Develop()->UuidGenerator(2, 4, 'default');

    // 【调用方式 2】：显式实例化服务组件（适用于提供 IDE 强类型代码补全提示的场景）
    // $Develop = new Develop($isas);
    // $uuidResponse = $Develop->UuidGenerator(2, 4, 'default');

    // 异常拦截机制已在 SDK 内部实现，若执行流成功向下推进，则代表 HTTP 状态码为 200 且响应体解析正常
    echo "响应成功！解析数据如下：\n";
    print_r($uuidResponse);

} catch (NetworkException $e) {
    // 异常捕获 1：底层网络传输及通讯层异常（如 DNS 解析失败、握手超时、网络断开等）
    echo "错误：网络传输层异常\n";
    echo "异常信息: " . $e->getMessage() . "\n";
    echo "底层错误码: " . $e->getCode() . "\n";
    echo "排查建议: 请检查网络连通性或 API 终结点域名解析状态。\n";

} catch (ServiceException $e) {
    // 异常捕获 2：应用层及业务逻辑异常（后端返回非 200 状态码，如鉴权失败、参数校验不通过、内部服务器错误等）
    echo "错误：ISAS 服务端业务异常\n";
    echo "异常信息: " . $e->getMessage() . "\n";
    echo "业务错误码: " . $e->getCode() . "\n";
    echo "HTTP 状态码: " . $e->getHttpStatusCode() . "\n";
    echo "---------------- 原始响应报文 ----------------\n";
    echo $e->getResponseBody() . "\n";
    echo "----------------------------------------------\n";

} catch (\BadMethodCallException $e) {
    // 异常捕获 3：SDK 组件及方法路由未定义异常（如调用了不存在的子服务或无效方法）
    echo "错误：SDK 内部组件路由异常: " . $e->getMessage() . "\n";
    echo "排查建议: 请核对调用的服务组件或方法名是否与当前 SDK 版本声明一致。\n";

} catch (IsasException $e) {
    // 异常捕获 4：SDK 运行时基础常规异常（如前置参数强校验未通过）
    echo "错误：SDK 运行时异常: " . $e->getMessage() . "\n";

} catch (\Throwable $e) {
    // 异常捕获 5：全局兜底拦截，捕获 PHP 引擎底层致命错误或未预期的运行时异构错误
    echo "错误：系统发生非预期严重错误: " . $e->getMessage() . "\n";
}

echo "\n==================================================\n";
echo "         ISAS 官方 SDK 接口调用演示结束\n";
echo "==================================================\n";

```

---

## 💡 常见错误与排查 (FAQ)

### 1. 报错 `Class "Isas\Sdk\Services\Ai" not found`

* **原因**：Composer自动加载缓存过期或本地文件不完整。

* **解决办法**：请检查 GitHub 仓库上是否存在 `src/` 目录且文件完整。在项目根目录下尝试强制刷新自动加载缓存：
```bash
composer clear-cache
composer dump-autoload -o

```



### 2. 报错 `Too few arguments to function Isas\Sdk\BaseService::__construct(), 0 passed...`

* **原因**：在实例化具体组件时没有通过小括号传递配置好的 `$client` 对象。

* **解决办法**：本 SDK 采用严谨的依赖注入设计。请不要直接 `new DouBaoAi()`，必须先 `new Client($token, $appSecret)`，再通过总入口调用。

---

## 🔒 开源协议

本项目基于 **[MIT License](https://www.google.com/search?q=LICENSE)** 协议开源。