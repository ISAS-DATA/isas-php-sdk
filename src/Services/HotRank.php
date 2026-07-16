<?php
/**
 * 功能说明：热点热榜类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class HotRank extends BaseService
{
    /**
     * https://api.istero.com/service/doc/360-hot-search
     * 360热搜榜单
     * @return array API 返回的 JSON 数组
     */
    public function top360(): array
    {
        $path = '/resource/v1/360/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/kuaishou-video-hotlist
     * 快手热搜榜单
     * @return array API 返回的 JSON 数组
     */
    public function kuaishouTop(): array
    {
        $path = '/resource/v1/kuaishou/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/quark-novel-top
     * 夸克小说热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkNovelTop(): array
    {
        $path = '/resource/v1/quark/novel/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/quark-anime-hot-chart
     * 夸克动漫热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkComicTop(): array
    {
        $path = '/resource/v1/quark/comic/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/quark-movie-top
     * 夸克电影热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkFilmTop(): array
    {
        $path = '/resource/v1/quark/film/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/quark-variety-hotlist
     * 夸克综艺热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkVarietyTop(): array
    {
        $path = '/resource/v1/quark/variety/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/quark-tv-hotlist
     * 夸克影视剧热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function quarkTvTop(): array
    {
        $path = '/resource/v1/quark/tv/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/baidu-novel-top
     * 百度小说实时TOP榜单
     * @return array API 返回的 JSON 数组
     */
    public function baiduNovelTop(): array
    {
        $path = '/resource/v1/baidu/novel/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/jinritoutiao-hotlist
     * 今日头条热榜获取服务
     * @return array API 返回的 JSON 数组
     */
    public function toutiaoHotlist(): array
    {
        $path = '/resource/v1/toutiao/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/douban-recent-movies-top
     * 豆瓣最近热门电影热榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function doubanRecentMoviesTop(): array
    {
        $path = '/resource/v1/douban/recent/movie/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/bilibili-hotlist
     * B 站 bilibili 热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function bilibiliHotlist(): array
    {
        $path = '/resource/v1/bilibili/search/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/weibo-hotlist
     * 微博实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function weiboHotlist(): array
    {
        $path = '/resource/v1/weibo/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/csdn-blog-toplist
     * CSDN 博客综合 TOP 榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function csdnBlogToplist(): array
    {
        $path = '/resource/v1/csdn/blog/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/sogou-hot-list
     * 搜狗实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function sogouHotList(): array
    {
        $path = '/resource/v1/sogou/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/zhihu-hotlist
     * 知乎实时热搜榜数据获取
     * @return array API 返回的 JSON 数组
     */
    public function zhihuHotlist(): array
    {
        $path = '/resource/v2/zhihu/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/douyin-hotlist
     * 抖音实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function douyinHotlist(): array
    {
        $path = '/resource/v1/douyin/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/bilibili-daily-ranking
     * B 站 Bilibili 全站实时日榜获取
     * @return array API 返回的 JSON 数组
     */
    public function bilibiliDailyRanking(): array
    {
        $path = '/resource/v1/bilibili/today/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/baidu-tv-top-list
     * 百度电视剧 TOP 榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function baiduTvTopList(): array
    {
        $path = '/resource/v1/baidu/teleplay/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/baidu-toplist
     * 百度实时 TOP 热点榜获取
     * @return array API 返回的 JSON 数组
     */
    public function baiduToplist(): array
    {
        $path = '/resource/v1/baidu/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/baidu-movie-top-list
     * 百度电影实时 TOP 榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function baiduMovieTopList(): array
    {
        $path = '/resource/v1/baidu/movie/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/ithome-hotlist
     * IT 之家今日实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function ithomeHotlist(): array
    {
        $path = '/resource/v1/ithome/today/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/acfun-daily-ranking
     * AcFun 全站实时日榜获取
     * @return array API 返回的 JSON 数组
     */
    public function acfunDailyRanking(): array
    {
        $path = '/resource/v1/acfun/today/top';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/sspai-hotlist
     * 少数派实时热搜榜单获取
     * @return array API 返回的 JSON 数组
     */
    public function sspaiHotlist(): array
    {
        $path = '/resource/v1/sspai/top';
        return $this->client->execute('POST', $path);
    }
}