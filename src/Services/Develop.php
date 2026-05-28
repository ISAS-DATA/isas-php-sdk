<?php
/**
 * 功能说明：研发辅助类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Develop extends BaseService
{
    /**
     * https://api.istero.com/service/doc/uuid-generator
     * 多版本UUID生成接口
     * @param int $version UUID版本，1/3/4/5，默认1（可选）
     * @param string $name 名称/标识符（V3/V5生效，可选）
     * @param string $namespace 命名空间UUID（V3/V5生效，可选）
     * @return array API 返回的 JSON 数组
     */
    public function UuidGenerator($version = 1, $name = '', $namespace = '')
    {
        $path = '/resource/v1/uuid/generate';
        $params = [];

        if (!empty($version)) {
            $params['version'] = (int)$version;
        }
        if (!empty($name)) {
            $params['name'] = (string)$name;
        }
        if (!empty($namespace)) {
            $params['namespace'] = (string)$namespace;
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/isas-user-info
     * ISAS平台获取个人基本信息（昵称、调用次数、余额、等级等）
     * @param int $isid 起零ISID（个人中心获取），必填
     * @return array API 返回的 JSON 数组
     */
    public function isasUserInfo($isid)
    {
        $path = '/resource/v1/isas/mine/information';
        $params = [
            'isid' => (int)$isid
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/chinese-unicode-converter
     * 汉字Unicode互转
     * @param string $text 待转换内容
     * @param int $type 1中文转Unicode 2Unicode转中文
     * @return array API 返回的 JSON 数组
     */
    public function chineseUnicodeConverter($text, $type)
    {
        $path = '/resource/v1/unicode/convert/chinese';
        $params = [
            'text' => (string)$text,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/utf8-zh-convert
     * UTF8 与中文互转服务（支持十六进制/十进制）
     * @param string $content 待转换的文本内容（必填）
     * @param string $type 转换类型：chinese_to_utf8 / utf8_to_chinese，默认 chinese_to_utf8
     * @param string $encode_type 编码类型：hex / dec，默认 hex
     * @return array API 返回的 JSON 数组
     */
    public function utf8ZhConvert($content, $type = 'chinese_to_utf8', $encode_type = 'hex')
    {
        $path = '/resource/v1/convert/utf8-chinese';
        $params = [
            'content' => (string)$content,
            'type' => (string)$type,
            'encode_type' => (string)$encode_type
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/sitemap-txt-to-xml
     * 网站地图 TXT 转 XML（用于SEO优化）
     * @param string $txt TXT 格式 sitemap 文件的 URL 地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function sitemapTxtToXml($txt)
    {
        $path = '/resource/v1/sitemap/txt/to/xml';
        $params = [
            'txt' => (string)$txt
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/rss-to-json
     * RSS 解析并转换为 JSON 格式
     * @param string $url RSS 源地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function rssToJson($url)
    {
        $path = '/resource/v1/rss/to/json';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/xml-to-json-converter
     * XML 格式数据转换为 JSON 格式
     * @param string $xml 需要转换的 XML 字符串（必填）
     * @return array API 返回的 JSON 数组
     */
    public function xmlToJsonConverter($xml)
    {
        $path = '/resource/v1/xml/to/json';
        $params = [
            'xml' => (string)$xml
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/random-useragent
     * 随机生成真实 User-Agent（支持桌面/移动设备）
     * @param string $type 设备类型：desktop 桌面 | mobile 移动，默认 desktop
     * @return array API 返回的 JSON 数组
     */
    public function randomUseragent($type = 'desktop')
    {
        $path = '/resource/v1/user/agent/generate';
        $params = [
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/json-to-yaml
     * JSON 转 YAML 格式转换
     * @param string $json 待转换JSON文本
     * @return array API 返回的 JSON 数组
     */
    public function jsonToYaml(string $json)
    {
        $path = '/resource/v1/json/to/yaml';
        $params = [
            'json' => $json
        ];
        return $this->client->execute('POST', $path, $params);
    }

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


    /**
     * https://api.istero.com/service/doc/ip-location-check
     * 全球IP归属地信息查询V2版
     * @param string $ip 待查询的IP地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function ipLocationCheck($ip)
    {
        $path = '/resource/v2/ip/query';
        $params = [
            'ip' => (string)$ip
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/htpasswd
     * htpasswd生成服务
     * @param string $username 用户名（必填）
     * @param string $password 密码（必填）
     * @param string $algorithm 加密方式，md5/crypt/sha1（可选）
     * @return array API 返回的 JSON 数组
     */
    public function generateHtpasswd($username, $password, $algorithm = '')
    {
        $path = '/resource/v1/htpasswd/generate';
        $params = [
            'username' => (string)$username,
            'password' => (string)$password
        ];

        if (!empty($algorithm)) {
            $params['algorithm'] = (string)$algorithm;
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/base-converter
     * 智能进制转换服务（自动识别进制，返回二/八/十/十六进制结果）
     * @param string $number 待转换的数值字符串（必填）
     * @return array API 返回的 JSON 数组
     */
    public function baseConverter($number)
    {
        $path = '/resource/v1/smart/batch/converter';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ascii-converter
     * ASCII 码转换为字符串（支持逗号/空格分隔）
     * @param string $ascii ASCII码串（必填）
     * @return array API 返回的 JSON 数组
     */
    public function asciiConverter($ascii)
    {
        $path = '/resource/v1/ascii/to/string';
        $params = [
            'ascii' => (string)$ascii
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/string-to-ascii
     * 字符串转为ASCII编码
     * @param string $content 待转换文本内容
     * @return array API 返回的 JSON 数组
     */
    public function stringToAscii(string $content)
    {
        $path = '/resource/v1/string/to/ascii';
        $params = [
            'content' => $content
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ping-test-online
     * Ping 在线测试
     * @param string $url 要测试的目标网址
     * @return array API 返回的 JSON 数组
     */
    public function pingTestOnline($url)
    {
        $path = '/resource/v1/ping/test';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/md4-encrypt
     * MD4加密服务，采用标准算法实现高效数据加密，确保信息安全传输与存储
     * @param string $data 需要加密的数据（必填）
     * @return array API 返回的 JSON 数组
     */
    public function md4Encrypt($data)
    {
        $path = '/resource/v1/md4/encryption';
        $params = [
            'data' => (string)$data
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/email-encoder
     * 邮箱地址 HTML 实体编码（防爬虫抓取）
     * @param string $email 待编码邮箱地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function emailEncoder($email)
    {
        $path = '/resource/v1/email/encode';
        $params = [
            'email' => (string)$email
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/yaml-to-json
     * YAML 格式转换为 JSON 格式
     * @param string $yaml 待转换的 YAML 文本内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function yamlToJson(string $yaml)
    {
        $path = '/resource/v1/yaml/to/json';
        $params = [
            'yaml' => $yaml
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/number-to-ip
     * 数字转IP地址
     * @param int $long 整型IP数值
     * @return array API 返回的 JSON 数组
     */
    public function numberToIp(int $long)
    {
        $path = '/resource/v1/long/to/ip';
        $params = [
            'long' => $long
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ip-to-number
     * IP地址转数字（长整型）
     * @param string $ip 合法IP地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function ipToNumber(string $ip)
    {
        $path = '/resource/v1/ip/to/long';
        $params = [
            'ip' => $ip
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/base-validator
     * 多进制格式合法性校验（支持十进制、十六进制、base32、二进制、八进制）
     * @param string $text 待校验的内容（必填）
     * @param string $type 校验类型，默认 decimal
     * @return array API 返回的 JSON 数组
     */
    public function baseValidator($text, $type = 'decimal')
    {
        $path = '/resource/v1/check/number/format';
        $params = [
            'text' => (string)$text,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/authcode-encryption
     * AuthCode加密生成服务
     * @param string $string 待加密字符（必填）
     * @param string $key 加密密钥（必填）
     * @param int $expiry 过期时间，单位秒（可选）
     * @return array API 返回的 JSON 数组
     */
    public function authCodeEncode($string, $key, $expiry = null)
    {
        $path = '/resource/v1/auth/code/encode';
        $params = [
            'string' => (string)$string,
            'key' => (string)$key
        ];

        if ($expiry !== null) {
            $params['expiry'] = (int)$expiry;
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/authcode-decrypt
     * Authcode解密
     * @param string $string 加密字符串
     * @param string $key 解密密钥
     * @return array API 返回的 JSON 数组
     */
    public function authcodeDecrypt(string $string, string $key)
    {
        $path = '/resource/v1/auth/code/decode';
        $params = [
            'string' => $string,
            'key' => $key
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tencent-cloud-eo-cache
     * 腾讯云EO创建清除缓存任务
     * @param string $secretId 腾讯云SecretId
     * @param string $secretKey 腾讯云SecretKey
     * @param array $url 要刷新的资源URL数组
     * @param string $type 刷新类型：purge_url/purge_prefix/purge_host/purge_all/purge_cache_tag
     * @return array API返回JSON数据
     */
    public function tencentCloudEoCache(
        string $secretId,
        string $secretKey,
        string $url,
        string $type = 'purge_url'
    )
    {
        $path = '/resource/v1/tencent/eo/fresh';
        $params = [
            'secretId' => $secretId,
            'secretKey' => $secretKey,
            'url' => $url,
            'type' => $type
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/tencent-cloud-eo-records
     * 腾讯云EO查询清除缓存历史记录
     * @param string $secretId 腾讯云SecretId（必填）
     * @param string $secretKey 腾讯云SecretKey（必填）
     * @param string $startTime 开始时间（必填）
     * @param string $endTime 结束时间（必填）
     * @return array API 返回的 JSON 数组
     */
    public function getTencentCloudEoRecords($secretId, $secretKey, $startTime, $endTime)
    {
        $path = '/resource/v1/tencent/eo/history/fresh';
        $params = [
            'secretId' => (string)$secretId,
            'secretKey' => (string)$secretKey,
            'startTime' => (string)$startTime,
            'endTime' => (string)$endTime
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/url-encoder-decoder
     * URL 编码/解码服务
     * @param string $text 待处理内容
     * @param int $type 1=编码，2=解码（默认1）
     * @return array API 返回的 JSON 数组
     */
    public function urlEncoderDecoder($text, $type = 1)
    {
        $path = '/resource/v1/url/encode/data';
        $params = [
            'text' => (string)$text,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/url-decoder
     * URL 解码专用
     * @param string $text 待解码的URL编码字符串
     * @return array API 返回的 JSON 数组
     */
    public function urlDecoder($text)
    {
        $path = '/resource/v1/url/decode/data';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/aes-decrypt
     * AES 解密专用
     * @param string $data 待解密的字符串
     * @param string $key 解密密钥
     * @param string $iv 解密偏移量
     * @param string $mode 解密模式
     * @return array API 返回的 JSON 数组
     */
    public function aesDecrypt($data, $key, $iv, $mode)
    {
        $path = '/resource/v1/aes/decrypt';
        $params = [
            'data' => (string)$data,
            'key' => (string)$key,
            'iv' => (string)$iv,
            'mode' => (string)$mode
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/aes-encrypt
     * AES 加密专用
     * @param string $data 待加密的字符串
     * @param string $key 加密密钥
     * @param string $iv 加密偏移量
     * @param string $mode 加密模式
     * @return array API 返回的 JSON 数组
     */
    public function aesEncrypt($data, $key, $iv, $mode)
    {
        $path = '/resource/v1/aes/encrypt';
        $params = [
            'data' => (string)$data,
            'key' => (string)$key,
            'iv' => (string)$iv,
            'mode' => (string)$mode
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/unique-id-generator
     * 唯一ID随机字符生成
     * @param int $type 字符类型，0-5，默认0（可选）
     * @param int $length 长度，默认8（可选）
     * @param string $start 自定义开头（可选）
     * @param string $end 自定义结尾（可选）
     * @param int $num 生成数量，默认1（可选）
     * @param string $format 输出格式，json/text（可选）
     * @param int $export 是否导出Excel（可选）
     * @return array API 返回的 JSON 数组
     */
    public function createUniqueId($type = 0, $length = 8, $start = '', $end = '', $num = 1, $format = 'json', $export = null)
    {
        $path = '/resource/v1/id/create';
        $params = [];

        if (!empty($type)) {
            $params['type'] = (int)$type;
        }
        if (!empty($length)) {
            $params['length'] = (int)$length;
        }
        if (!empty($start)) {
            $params['start'] = (string)$start;
        }
        if (!empty($end)) {
            $params['end'] = (string)$end;
        }
        if (!empty($num)) {
            $params['num'] = (int)$num;
        }
        if (!empty($format)) {
            $params['format'] = (string)$format;
        }
        if ($export !== null) {
            $params['export'] = (int)$export;
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/multi-data-validator
     * 多类型数据验证
     * @param string $text 待验证内容
     * @param int $type 验证类型 0:数字1:汉字2:英文3:E-mail4:QQ5:手机号6:身份证7:网址URL8:JSON9:IP10:时间11:顶级域名12:金额13:小数14：日期15:Unicode
     * @return array API 返回的 JSON 数组
     */
    public function multiDataValidator($text, $type)
    {
        $path = '/resource/v1/character/check';
        $params = [
            'text' => (string)$text,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/color-code-converter
     * 颜色代码格式转换
     * @param string $color 颜色代码（HEX/RGB/RGBA/HSL/HSLA）
     * @return array API 返回的 JSON 数组
     */
    public function colorCodeConverter($color)
    {
        $path = '/resource/v1/color/convert';
        $params = [
            'color' => (string)$color
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/string-deduplicator
     * 字符串文本去重
     * @param string $text 待去重的文本内容
     * @return array API 返回的 JSON 数组
     */
    public function stringDeduplicator($text)
    {
        $path = '/resource/v1/duplicate/removal';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/guid-generator
     * GUID 全局唯一标识符生成
     * @return array API 返回的 JSON 数组
     */
    public function guidGenerator()
    {
        $path = '/resource/v1/guid/generate';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/user-agent-parser
     * User-Agent 信息解析
     * @param string $data 浏览器UA信息字符串
     * @return array API 返回的 JSON 数组
     */
    public function userAgentParser($data)
    {
        $path = '/resource/v1/parse/user/agent';
        $params = [
            'data' => (string)$data
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/cron-expression-checker
     * Cron 表达式校验与执行时间查询
     * @param string $expression Cron 表达式
     * @return array API 返回的 JSON 数组
     */
    public function cronExpressionChecker($expression)
    {
        $path = '/resource/v1/cron/query';
        $params = [
            'expression' => (string)$expression
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/time-difference-calculator
     * 时间差计算器
     * @param int $type 计算类型（1-6）
     * @param string $date 开始时间
     * @param string $date2 结束时间（可选）
     * @return array API 返回的 JSON 数组
     */
    public function timeDifferenceCalculator($type, $date, $date2 = '')
    {
        $path = '/resource/v1/date/countdown';
        $params = [
            'type' => (int)$type,
            'date' => (string)$date,
            'date2' => (string)$date2
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/linux-command-query
     * Linux 命令查询
     * @param string $code Linux 指令名称
     * @return array API 返回的 JSON 数组
     */
    public function linuxCommandQuery($code)
    {
        $path = '/resource/v1/linux/code/query';
        $params = [
            'code' => (string)$code
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/unix-timestamp-converter
     * Unix 时间戳与日期互转接口
     * @param string $time 时间字符串或时间戳
     * @param int $type 1=转时间 2=转时间戳
     * @return array API 返回的 JSON 数组
     */
    public function unixTimestampConverter($time, $type = 1)
    {
        $path = '/resource/v1/unixtime/convert';
        $params = [
            'time' => (string)$time,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/universal-data-cryptor
     * 多类型通用数据加密解密
     * @param string $text 待处理文本（必填）
     * @param string|int $type 加密类型 1-8（可选，默认1）
     * @return array API 返回的 JSON 数组
     */
    public function universalDataCryptor($text, $type = 1)
    {
        $path = '/resource/v1/data/encrypt';
        $params = [
            'text' => (string)$text,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/json-to-xml
     * JSON结构快捷转XML结构（需encodeURIComponent编码）
     * @param string $json 待转换的JSON字符串（会自动进行encodeURIComponent编码）
     * @return string API返回的XML内容
     */
    public function jsonToXml($json)
    {
        $path = '/resource/v1/json/to/xml';
        $params = [
            'json' => (string)$json // 注意：底层需确保此值被encodeURIComponent编码
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/md5-encrypt
     * MD5加密服务，单向哈希不可逆，高效生成128位指纹，保障数据校验与传输安全
     * @param string $text 需要加密的内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function md5Encrypt($text)
    {
        $path = '/resource/v1/md5/encode/data';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/csr-generator
     * CSR（证书签名请求）快速生成，简化SSL/TLS证书申请流程，保障数据传输安全
     * @param string $organizationName 组织/公司全称（必填）
     * @param string $organizationalUnitName 部门或单位（必填）
     * @param string $province 省份（必填）
     * @param string $city 城市（必填）
     * @param string $domain 域名（必填）
     * @param string $email 邮箱（必填）
     * @return array API 返回的 JSON 数组
     */
    public function csrGenerator($organizationName, $organizationalUnitName, $province, $city, $domain, $email)
    {
        $path = '/resource/v1/csr/create';
        $params = [
            'organizationName' => (string)$organizationName,
            'organizationalUnitName' => (string)$organizationalUnitName,
            'province' => (string)$province,
            'city' => (string)$city,
            'domain' => (string)$domain,
            'email' => (string)$email
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/visitor-info-checker
     * 安全获取来访者合法信息（IP、地理位置、浏览器、系统、设备）
     * @return array API 返回的 JSON 数组
     */
    public function visitorInfoChecker()
    {
        $path = '/resource/v1/visitor/information';
        // 无业务入参，$params 留空
        $params = [];
        return $this->client->execute('POST', $path, $params);
    }
}

