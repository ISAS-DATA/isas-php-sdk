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
            if (PHP_VERSION_ID < 80500) {
                curl_close($ch);
            }
            throw new NetworkException("SDK 网络请求失败: [{$curlErrno}] {$curlError}", $curlErrno);
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (PHP_VERSION_ID < 80500) {
            curl_close($ch);
        }

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