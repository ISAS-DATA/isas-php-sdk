<?php

namespace Isas\Sdk\Exception;

namespace Isas\Sdk\Exception;

/**
 * 业务/API 服务异常
 */
class ServiceException extends IsasException
{
    // 新增两个属性，用来存放“案发现场”的详细数据
    private int $httpStatusCode; // HTTP 状态码（如 400, 403, 500）
    private ?string $responseBody;   // 服务器返回的原始数据（通常是 JSON 字符串，甚至是报错的 HTML）

    /**
     * @param string $message 提示信息
     * @param int $code API 内部定义的错误码
     * @param int $httpStatusCode HTTP 状态码
     * @param string|null $responseBody 原始响应体
     */
    public function __construct($message, $code = 0, $httpStatusCode = 0, string $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->httpStatusCode = $httpStatusCode;
        $this->responseBody = $responseBody;
    }

    /**
     * 外部调试可以用 $e->getHttpStatusCode() 获取状态码
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * 外部调试可以用 $e->getResponseBody() 打印出服务器到底吐出了什么垃圾数据
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }
}