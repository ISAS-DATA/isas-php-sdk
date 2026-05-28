<?php

namespace Isas\Sdk\Exception;

/**
 * 网络/通讯异常
 */
class NetworkException extends IsasException
{
    /**
     * 构造函数
     * @param string $message 错误描述
     * @param int $code cURL 的错误码
     */
    public function __construct($message, $code = 0)
    {
        // 传递给父类
        parent::__construct($message, $code);
    }
}