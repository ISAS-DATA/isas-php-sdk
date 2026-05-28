<?php

namespace Isas\Sdk;
/**
 * 功能说明：抽象服务基类
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @copyright © 2024-2026 ISAS-DATA
 * @license MIT License
 *
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 *
 * @create 2025-05-26
 * @update 2025-05-26
 */

abstract class BaseService
{
    /**
     * @var Client
     */
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}