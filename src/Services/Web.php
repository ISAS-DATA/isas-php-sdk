<?php
/**
 * 功能说明：网站类相关服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Web extends BaseService
{
    /**
     * https://api.istero.com/service/doc/gzip-check
     * 网站Gzip压缩检测（检测是否启用、压缩率、大小等）
     * @param string $url 待检测的网站地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function gzipCheck(string $url): array
    {
        $path = '/resource/v1/gzip/check';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/favicon-extractor
     * 获取网站Favicon图标
     * @param string $url 目标网站地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function faviconExtractor(string $url): array
    {
        $path = '/resource/v1/get/favicon';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/http-response-checker
     * 获取网站HTTP请求响应信息（状态码、响应头、耗时）
     * @param string $url 目标网址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function httpResponseChecker(string $url): array
    {
        $path = '/resource/v1/get/http/information';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ssl-cert-checker
     * SSL证书数据查询验证
     * @param string $domain 域名（必填）
     * @return array API 返回的 JSON 数组
     */
    public function sslCertChecker(string $domain): array
    {
        $path = '/resource/v1/ssl/verification';
        $params = [
            'domain' => $domain
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/police-record-checker
     * 公安网安备案查询
     * @param string $domain 待查询域名（必填）
     * @return array API 返回的 JSON 数组
     */
    public function policeRecordChecker(string $domain): array
    {
        $path = '/resource/v1/police/icp/query';
        $params = [
            'domain' => $domain
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/icp-record-check
     * 网站ICP备案数据查询
     *
     * @param string $domain 查询的域名
     * @return array API 返回的 JSON 数组
     */
    public function icpRecordCheck(string $domain): array
    {
        $path = '/resource/v2/icp/query';
        $params = [
            'domain' => $domain
        ];

        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/webpage-image-extractor
     * 提取网页全部图片URL地址
     * @param string $url 目标网页地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function webpageImageExtractor(string $url): array
    {
        $path = '/resource/v1/get/web/all/images';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/webpage-url-extractor
     * 获取网页全部URL链接
     * @param string $url 目标网页地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function webpageUrlExtractor(string $url): array
    {
        $path = '/resource/v1/get/web/all/url';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/website-info-checker
     * 网站相关信息快捷查询（标题、关键词、描述）
     * @param string $url 目标网址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function websiteInfoChecker(string $url): array
    {
        $path = '/resource/v1/website/info';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/whois-checker
     * 域名 Whois 信息查询接口
     * @param string $domain 顶级域名
     * @return array API 返回的 JSON 数组
     */
    public function whoisChecker(string $domain): array
    {
        $path = '/resource/v1/whois/query';
        $params = [
            'domain' => $domain
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/whois-v2
     * 域名Whois信息查询V2版本
     * @param string $domain 待查询域名地址
     * @return array API 返回的 JSON 数组
     */
    public function whoisV2(string $domain): array
    {
        $path = '/resource/v2/whois/query';
        $params = [
            'domain' => $domain
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/domain-suffixes
     * 可注册域名后缀查询（支持关键字筛选）
     * @param string|null $keyword 后缀关键字（可选，如com）
     * @return array API 返回的 JSON 数组
     */
    public function domainSuffixes(string $keyword = null): array
    {
        $path = '/resource/v1/get/domain/can_reg/list';
        $params = [];
        if ($keyword !== null) {
            $params['keyword'] = $keyword;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tencent-domain-price
     * 腾讯云域名价格查询（注册/续费/转入）
     * @param string $tld 域名后缀（必填，如com、cn）
     * @param int $year 年限（必填，1-10）
     * @param string $operation 操作类型（必填，new=注册、renew=续费、transfer=转入）
     * @return array API 返回的 JSON 数组
     */
    public function tencentDomainPrice(string $tld, int $year, string $operation): array
    {
        $path = '/resource/v1/domain/price';
        $params = [
            'tld' => $tld,
            'year' => $year,
            'operation' => $operation
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/domain-registration-check
     * 域名注册状态查询（是否可注册、溢价、敏感词）
     * @param string $domain 域名（必填，如example.com）
     * @return array API 返回的 JSON 数组
     */
    public function domainRegistrationCheck(string $domain): array
    {
        $path = '/resource/v1/domain/reg/status';
        $params = [
            'domain' => $domain
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/url-unshortener
     * 短链接还原（解析缩短网址为原始地址）
     * @param string $url 待还原的短链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function urlUnshortener(string $url): array
    {
        $path = '/resource/v1/url/reduction';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/xr-url-shortener
     * 夏柔网址缩短服务
     * @param string $url 待缩短的网址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function xiarouUrlShortener(string $url): array
    {
        $path = '/resource/v1/xiarou/url/zip';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/cdn-info-checker
     * 网站CDN信息查询服务，提供节点IP、运营商、DNS解析记录等数据
     * @param string $url 待查询的网址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function cdnInfoChecker(string $url): array
    {
        $path = '/resource/v1/cdn/check/information';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/taobao-suggestions
     * 淘宝商品搜索建议词获取，根据输入关键词智能返回相关搜索建议
     * @param string $keywords 搜索关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function taobaoSuggestions(string $keywords): array
    {
        $path = '/resource/v1/taobao/search/suggest';
        $params = [
            'keywords' => $keywords
        ];
        return $this->client->execute('POST', $path, $params);
    }
}