<?php
/**
 * 功能说明：新闻类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class News extends BaseService
{
    /**
     * https://api.istero.com/service/doc/cctv-entertainment-news
     * CCTV文体娱乐新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvEnt()
    {
        $path = '/resource/v1/cctv/news/ent';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/cctv-tech-news
     * CCTV实时最新科技新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvTech()
    {
        $path = '/resource/v1/cctv/news/technology';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/cctv-legal-news
     * CCTV 最新法治新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvLegalNews()
    {
        $path = '/resource/v1/cctv/news/law';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/cctv-domestic-news
     * CCTV 最新国内新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvDomesticNews()
    {
        $path = '/resource/v1/cctv/china/latest/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/cctv-world-news
     * CCTV 实时最新国际新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvWorldNews()
    {
        $path = '/resource/v1/cctv/world/latest/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/cctv-social-news
     * CCTV 实时最新社会新闻获取
     * @return array API 返回的 JSON 数组
     */
    public function cctvSocialNews()
    {
        $path = '/resource/v1/cctv/society/latest/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * 澎湃新闻实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function pengpaiNewsTop()
    {
        $path = '/resource/v1/pengpai/news/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/quarknews-hotlist
     * 夸克新闻热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkNewsTop()
    {
        $path = '/resource/v1/quark/news/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/tencent-news-hotlist
     * 腾讯新闻实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function tencentNewsHotlist()
    {
        $path = '/resource/v1/tencent/news/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/yangtse-news
     * 扬子晚报新闻数据
     * @return array API 返回的 JSON 数组
     */
    public function yangtseNews()
    {
        $path = '/resource/v1/yangzi/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/xinhua-daily-realtime
     * 新华日报实时新闻数据
     * @return array API 返回的 JSON 数组
     */
    public function xinhuaDailyRealtime()
    {
        $path = '/resource/v1/xinhua/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/southern-daily-news
     * 南方日报实时新闻数据
     * @return array API 返回的 JSON 数组
     */
    public function southernDailyNews()
    {
        $path = '/resource/v1/nanfang/news';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/daily-world-news-briefing
     * 60S读世界 每日精选国内外热点新闻简报与微语
     * @return array API 返回的 JSON 数组
     */
    public function dailyWorld60s()
    {
        $path = '/resource/v1/60s/read/world';
        return $this->client->execute('POST', $path);
    }


}