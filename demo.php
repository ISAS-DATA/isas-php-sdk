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