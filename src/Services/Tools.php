<?php
/**
 * 功能说明：综合工具类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Tools extends BaseService
{
    /**
     * https://api.istero.com/service/doc/anime-wallpaper-random
     * 随机动漫壁纸
     * @return array API 返回的 JSON 数组
     */
    public function animeWallpaperRandom()
    {
        $path = '/resource/v1/rand/anime/images';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/bing-daily-photo
     * Bing每日壁纸
     * @param string $action 可选值：“rand ”为随机
     * @param string $day 获取几天前的图片，与rand任选其一
     * @param string $type 输出类型。json：输出json，image:直接输出图片
     * @param string $device 输出设备：pc：pc端壁纸 mobile：移动端壁纸
     * @return array API 返回的 JSON 数组
     */
    public function bingDailyPhoto($action, $day, $type, $device = "pc")
    {
        $params = [
            'action' => (string)$action,
            'day' => (int)$day,
            'type' => (string)$type,
            'device' => (string)$device,

        ];
        $path = '/resource/v1/bing/wallpaper';
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/emoji-search
     * 表情符号搜索
     * @param string $keywords 搜索关键词
     * @param int $page 页数，默认：1
     * @return array API 返回的 JSON 数组
     */
    public function emojiSearch($keywords, $page = 1)
    {
        $path = '/resource/v1/emoji/search';
        $params = [
            'keywords' => (string)$keywords,
            'page' => (int)$page
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/vehicle-fuel-calculator
     * 机动车油耗计算
     * @param string $distance 行驶公里数
     * @param string $used 耗油量（升）
     * @param string $price 油价（元/升）
     * @return array API 返回的 JSON 数组
     */
    public function vehicleFuelCalculator($distance, $used, $price)
    {
        $path = '/resource/v1/oli/consumption/calc';
        $params = [
            'distance' => (string)$distance,
            'used' => (string)$used,
            'price' => (string)$price
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/china-credit-blacklist
     * 全国失信人信息查询（老赖查询）
     * @param string $name 姓名或企业名称
     * @return array API 返回的 JSON 数组
     */
    public function chinaCreditBlacklist($name)
    {
        $path = '/resource/v1/laolai';
        $params = [
            'name' => (string)$name,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/vehicle-inspection-calculator
     * 全种类车检数据查询计算
     * @param int $type 车辆类型 (1-8)
     * @param string $reg_date 车辆注册日期 (YYYY-MM-DD)
     * @param int $special 是否事故/改装车 (0/1)
     * @return array API 返回的 JSON 数组
     */
    public function vehicleInspectionCalculator($reg_date, $type = 3, $special = 0)
    {
        $path = '/resource/v1/insurance/premium/calculation';
        $params = [
            'type' => (int)$type,
            'reg_date' => (string)$reg_date,
            'special' => (int)$special,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/daily-motivation
     * 每日一言 / 随机一言
     * @return array 包含 text 字段的数组
     */
    public function dailyMotivation()
    {
        $path = '/resource/v1/yiyan/rand';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/pexels-4k-videos
     * Pexels 4K 视频搜索
     * @param string $keywords 搜索关键词（建议使用英文）
     * @return array API 返回的 JSON 数组
     */
    public function pexels4kVideos($keywords)
    {
        $path = '/resource/v1/pexels/video/search';
        $params = [
            'keywords' => (string)$keywords,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/pexels-4k-photos
     * Pexels 超清 4K 摄影图搜索
     * @param string $keywords 搜索关键词（建议使用英文）
     * @return array API 返回的 JSON 数组
     */
    public function pexels4kPhotos($keywords)
    {
        $path = '/resource/v1/pexels/images/search';
        $params = [
            'keywords' => (string)$keywords,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/harddisk-ranking
     * 硬盘天梯排行榜数据
     * @return array API 返回的 JSON 数组
     */
    public function harddiskRanking()
    {
        $path = '/resource/v1/ssd/data';
        return $this->client->execute('POST', $path);
    }

    /**
     * 商品条形码69码生成
     * https://api.istero.com/service/doc/barcode69-generator
     * @param string $text 69码数字（EAN-13格式）
     * @param string $type 输出类型：image（默认，直接输出图片）| json（返回base64数据）
     * @return array API 返回的 JSON 数组
     */
    public function barcode69Generator($text, $type = 'image')
    {
        $path = '/resource/v1/barcode/create';
        $params = [
            'text' => (string)$text,
            'type' => $type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 全球地震历史数据查询
     * https://api.istero.com/service/doc/earthquake-history
     * @param string $m 震级（如 3.1）
     * @param string $startTime 发生时间区间开始（Y-m-d H:i:s）
     * @param string $endTime 发生时间区间结束（Y-m-d H:i:s）
     * @param int $page 页数
     * @param int $deph 深度
     * @param string $location 位置（如“日本”）
     * @return array API 返回的 JSON 数组
     */
    public function earthquakeHistory($m = '', $startTime = '', $endTime = '', $page = 1, $deph = 0, $location = '')
    {
        $path = '/resource/v1/earthquak/data';
        $params = [
            'm' => (string)$m,
            'startTime' => (string)$startTime,
            'endTime' => (string)$endTime,
            'page' => (int)$page,
            'deph' => (int)$deph,
            'location' => (string)$location
        ];
        $params = array_filter($params, function ($v) {
            return $v !== '' && $v !== 0;
        });
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * 微信域名拦截检测
     * https://api.istero.com/service/doc/wechat-url-block-checker
     * @param string $url 待检测的URL（需包含 http:// 或 https://）
     * @return array API 返回的 JSON 数组
     */
    public function wechatUrlBlockChecker($url)
    {
        $path = '/resource/v1/wechat/url/check';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 中国法定节假日数据查询
     * https://api.istero.com/service/doc/holiday-data
     * @param int $date 查询日期（例如 2025-05-01）
     * @return array API 返回的 JSON 数组
     */
    public function holidayData($date)
    {
        $path = '/resource/v1/check/holiday';
        $params = [
            'date' => (int)$date
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 骚扰电话查询（号码标记检测）
     * https://api.istero.com/service/doc/spam-call-checker
     * @param string $number 待查询的手机号码
     * @return array API 返回的 JSON 数组
     */
    public function spamCallChecker($number)
    {
        $path = '/resource/v1/harassing/calls';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 全球电视节目直播源查询
     * https://api.istero.com/service/doc/tv-live-sources
     * @param string $name 频道名称（支持模糊匹配，如“湖南”）
     * @param int $page 页码（可选，默认 1）
     * @return array API 返回的 JSON 数组
     */
    public function tvLiveSources($name, $page = 1)
    {
        $path = '/resource/v1/tv/host';
        $params = [
            'name' => (string)$name,
            'page' => max(1, (int)$page)
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 字体商用版权查询服务
     * https://api.istero.com/service/doc/font-license-check
     * @param string $keywords 字体关键字（如“黑体”）
     * @return array API 返回的 JSON 数组
     */
    public function fontLicenseCheck($keywords)
    {
        $path = '/resource/v1/font/copyright';
        $params = [
            'keywords' => (string)$keywords
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 二维码解析识别
     * https://api.istero.com/service/doc/qr-code-scanner
     * @param string $url 图片URL或Base64编码的图片数据
     * @return array API 返回的 JSON 数组
     */
    public function qrCodeScanner($url)
    {
        $path = '/resource/v1/qrcode/render';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * 云文本存储服务 (Cloud Text Storage)
     * 文档：https://api.istero.com/service/doc/cloud-text-storage
     * @param string $action 操作类型：save（存储）、get（获取）、delete（删除）
     * @param string $text 待存储的文本内容（save时必填）
     * @param string $sid 记录ID（get/delete时必填，save后返回）
     * @return array API 返回的 JSON 数组
     */
    public function cloudTextStorage($action, $text = '', $sid = '')
    {
        $path = '/resource/v1/text/storage';
        $params = [
            'action' => $action,
        ];
        if ($action === 'save') {
            $params['text'] = (string)$text;
        } elseif (in_array($action, ['get', 'delete']) && $sid) {
            $params['sid'] = $sid;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 全国省份实时油价查询V2
     * https://api.istero.com/service/doc/china-gas-prices-v2
     * @param string $keyword 省份或城市名称（如“成都”）
     * @return array API 返回的 JSON 数组
     */
    public function chinaGasPricesV2($keyword)
    {
        $path = '/resource/v2/oilprice';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 快捷简体繁体转换 V2
     * 文档：https://api.istero.com/service/doc/simplified-traditional-converter
     * @param string $text 待转换文本
     * @param int $type 转换类型：0=简转标准繁, 1=简转台湾繁, 2=简转香港繁, 3=标准繁转简, 4=台湾繁转简, 5=香港繁转简
     * @return array
     */
    public function hanziConvert($text, $type = 0)
    {
        $path = '/resource/v2/hanzi/convert';
        $params = [
            'text' => (string)$text,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * 百度网盘链接状态检测
     * https://api.istero.com/service/doc/baidunetdisk-link-status-check
     * @param string $url 百度网盘分享链接
     * @return array API 返回的 JSON 数组
     */
    public function baidunetdiskLinkStatusCheck($url)
    {
        $path = '/resource/v1/baidu/disk/status';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/wechat-qrcode-generator
     * 微信公众号关注二维码生成
     * @param string $user_account 微信公众号微信号
     * @param string $type 输出类型：image图片 / json返回base64
     * @return array API 返回的 JSON 数组
     */
    public function wechatQrcodeGenerator($user_account, $type = 'image')
    {
        $path = '/resource/v1/mpweixin/qrcode/create';
        $params = [
            'user_account' => (string)$user_account,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 当前时间温馨提示
     * https://api.istero.com/service/doc/current-time-greeting
     * @return array API 返回的 JSON 数组
     */
    public function currentTimeGreeting()
    {
        $path = '/resource/v1/greeting/message';
        return $this->client->execute('POST', $path);
    }

    /**
     * 支付宝到账音效生成
     * https://api.istero.com/service/doc/alipay-payment-sound
     * @param string $money 金额
     * @param string $voice_type 音效类型：alipay支付宝 / koubei口碑
     * @param string $format_type 输出格式：audio音频流 / json返回json
     * @return array API 返回的 JSON 数组
     */
    public function alipayPaymentSound($money, $voice_type = 'alipay', $format_type = 'json')
    {
        $path = '/resource/v1/alipay/voice';
        $params = [
            'money' => (string)$money,
            'voice_type' => (string)$voice_type,
            'format_type' => (string)$format_type
        ];

        return $this->client->execute('POST', $path, $params);
    }


    /**
     * 全球货币汇率查询与兑换计算
     * https://api.istero.com/service/doc/currency-exchange-rates
     * @param int $price 金额
     * @param string $form 原始币种
     * @param string $to 目标币种
     * @return array API 返回的 JSON 数组
     */
    public function currencyExchangeRates($price, $form, $to)
    {
        $path = '/resource/v1/exchange/rate';
        $params = [
            'price' => (string)$price,
            'form' => (string)$form,
            'to' => (string)$to
        ];

        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/trip-article-fetch
     * 获取携程游记文章列表
     * @param array $params 可选筛选参数
     *   - pageNum int 页码（默认1）
     *   - who int 出行人群：1亲子,2和父母,3和朋友,4一个人,5夫妻,6情侣
     *   - day int 出行天数：1(1-2天),3(3-5天),6(6-8天),9(9-14天),15(15天以上)
     *   - time int 出发月份：3(3-5月),6(6-8月),9(9-11月),12(12-2月)
     *   - mode int 玩法：1火车,2美食林,3周末游,4省钱,5穷游,6奢侈,7酒店,8摄影,9徒步,10自驾,11露营,12骑行,13海滨海岛,14滑雪,15潜水,16游轮,17古镇,18购物
     * @return array API 返回的 JSON 数组
     */
    public function tripArticleFetch($params = [])
    {
        $path = '/resource/v1/ctrip/travel/books';
        $validParams = ['pageNum', 'who', 'day', 'time', 'mode'];

        $filteredParams = [];
        foreach ($params as $key => $value) {
            if (in_array($key, $validParams) && $value !== null && $value !== '') {
                $filteredParams[$key] = $value;
            }
        }

        return $this->client->execute('POST', $path, $filteredParams);
    }

    /**
     * https://api.istero.com/service/doc/gold-price-today
     * 获取今日金价
     * @return array API 返回的 JSON 数组
     */
    public function goldPriceToday()
    {
        $path = '/resource/v1/gold/price';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/chinese-solar-terms
     * 年度二十四节气查询
     * @param string $year 年份（1990-2026）
     * @return array API 返回的 JSON 数组
     */
    public function chineseSolarTerms($year)
    {
        $path = '/resource/v1/year/solar/terms/query';
        $params = [
            'year' => (string)$year
        ];
        return $this->client->execute('GET', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/word-antonyms-search
     * 词语反义词查询
     * @param string $word 要查询的词语（必填）
     * @return array API 返回的 JSON 数组
     */
    public function wordAntonymsSearch($word)
    {
        $path = '/resource/v1/word/fanyi';
        $params = [
            'word' => (string)$word
        ];
        return $this->client->execute('GET', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/synonyms-lookup
     * 词语近义词查询
     * @param string $word 要查询的词语（必填）
     * @return array API 返回的 JSON 数组
     */
    public function synonymsLookup($word)
    {
        $path = '/resource/v1/word/jinyi';
        $params = [
            'word' => (string)$word
        ];
        return $this->client->execute('GET', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/license-plate-lookup
     * 全国车牌号归属地查询
     * @param string $number 车牌号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function licensePlateLookup($number)
    {
        $path = '/resource/v1/car/number/belonging';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/wechat-music-extractor
     * 微信公众号文章音乐提取
     * @param string $url 微信公众号文章链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function wechatMusicExtractor($url)
    {
        $path = '/resource/v1/weixin/article/music';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/maoyan-box-office
     * 猫眼电影实时票房 Top 榜
     * @return array API 返回的 JSON 数组
     */
    public function maoyanBoxOffice()
    {
        $path = '/resource/v1/maoyan/movie/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/zhouyi-mobile-luck
     * 周易手机号码吉凶分析
     * @param string $phone 手机号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function zhouyiMobileLuck($phone)
    {
        $path = '/resource/v1/zhouyi/phone/query';
        $params = [
            'phone' => (string)$phone
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/country-info-query
     * 全球国家信息查询
     * @param string $keyword 关键词（国家名称、首都名称，必填）
     * @return array API 返回的 JSON 数组
     */
    public function countryInfoQuery($keyword)
    {
        $path = '/resource/v1/countries/data/query';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/solar-terms-by-date
     * 通过日期查询二十四节气
     * @param string $date 日期（格式：Y-m-d，如 2024-02-19，必填）
     * @return array API 返回的 JSON 数组
     */
    public function solarTermsByDate($date)
    {
        $path = '/resource/v1/solar/terms/query';
        $params = [
            'date' => (string)$date
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/recipe-collection
     * 菜谱大全查询
     * @param string $name 菜名关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function recipeCollection($name)
    {
        $path = '/resource/v1/cookbook';
        $params = [
            'name' => (string)$name
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/tax-calculator-2026
     * 工资个税计算服务（2026版）
     * @param float $salary 月薪（必填）
     * @param float $bonus 年终奖
     * @param float $insurance_base 社保基数
     * @param array $deductions 专项附加扣除数组 [children_education, ...]
     * @return array API 返回的 JSON 数组
     */
    public function taxCalculator2026($salary, $bonus = 0.0, $insurance_base = null, $deductions = [])
    {
        $path = '/resource/v1/calculate/tax/2026';

        $params = [
            'salary' => (float)$salary,
            'bonus' => (float)$bonus,
        ];

        if ($insurance_base !== null) {
            $params['insurance_base'] = (float)$insurance_base;
        }

        if (!empty($deductions)) {
            $params = array_merge($params, $deductions);
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/gpu-ranking
     * GPU天梯排行榜数据
     * @return array API 返回的 JSON 数组
     */
    public function gpuRanking()
    {
        $path = '/resource/v1/gpu/data';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/qqmusic-lyrics
     * QQ音乐歌词获取（通过MID）
     * @param string $mid QQ音乐歌曲MID（必填）
     * @return array API返回的JSON数组，包含lrc歌词
     */
    public function qqmusicLyrics($mid)
    {
        $path = '/resource/v1/qqmusic/lyric/get';
        $params = [
            'mid' => (string)$mid
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/baidu-suggest-keywords
     * 百度联想关键词获取
     * @param string $word 查询词汇（必填）
     * @return array API 返回的 JSON 数组
     */
    public function baiduSuggestKeywords($word)
    {
        $path = '/resource/v1/baidu/keywords';
        $params = [
            'word' => (string)$word
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/weather-hefeng-api-v1
     * 和风天气实时查询 (v1)
     * @param string $city 城市名称（如“北京”或“沈阳市”）
     * @return array API 返回的 JSON 数组
     */
    public function weatherHefengV1($city)
    {
        $path = '/resource/v1/hefeng/weather';
        $params = [
            'city' => (string)$city
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/phone-number-generator
     * 手机号码随机生成服务
     * @param int $count 生成数量（1-100，默认1）
     * @param string $prefix 号段前缀（如"13"、"176"，默认随机）
     * @return array API 返回的 JSON 数组
     */
    public function phoneNumberGenerator($count = 1, $prefix = '')
    {
        $path = '/resource/v1/phone/generate';
        $params = [
            'count' => (int)$count,
            'prefix' => (string)$prefix
        ];
        if (empty($params['prefix'])) {
            unset($params['prefix']);
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/steam-games-data
     * Steam游戏实时数据获取
     * @param int $gameID Steam游戏数字ID（必填，如 3240220）
     * @return array API 返回的 JSON 数组
     */
    public function steamGamesData($gameID)
    {
        $path = '/resource/v1/steam/game/stats';
        $params = [
            'gameID' => (int)$gameID
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/chinese-holidays-data
     * 中国全年法定节假日数据获取
     * @param int $year 查询年份（如 2025）
     * @return array API 返回的 JSON 数组
     */
    public function chineseHolidaysData($year)
    {
        $path = '/resource/v1/hoilday/query';
        $params = [
            'year' => (int)$year
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/china-gas-prices
     * 中国省份实时油价查询
     * @param string $province 省份名称（如"辽宁"、"北京"）
     * @return array API 返回的 JSON 数组
     */
    public function chinaGasPrices($province)
    {
        $path = '/resource/v1/oilprice';
        $params = [
            'province' => (string)$province
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/wechat-article-fetch
     * 微信公众号文章内容获取
     * @param string $url 微信公众号文章链接（必填，如 "https://mp.weixin.qq.com/s/..."）
     * @return array API 返回的 JSON 数组
     */
    public function wechatArticleFetch($url)
    {
        $path = '/resource/v1/wechat/article/fetch';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/360-suggest-keywords
     * 360搜索联想关键词获取
     * @param string $word 查询关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function suggestKeywords360($word)
    {
        $path = '/resource/v1/360/keywords';
        $params = [
            'word' => (string)$word
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/weather-v2
     * 天气查询服务 V2 版
     * @param string $city 城市名称（如“大连”、“上海”）
     * @return array API 返回的 JSON 数组
     */
    public function weatherV2($city)
    {
        $path = '/resource/v2/weather/query';
        $params = [
            'city' => (string)$city
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-draw
     * 随机抽签服务
     * @param string $data 抽签数据，用英文逗号分隔（必填，如 "选项A,选项B,选项C"）
     * @param int $need 需要抽取的数量（可选，默认 1）
     * @param int $simple 是否简易版（可选，1:直接输出结果，默认 0）
     * @return array API 返回的 JSON 数组
     */
    public function randomDraw($data, $need = 1, $simple = 0)
    {
        $path = '/resource/v1/draw/lots';
        $params = [
            'data' => (string)$data,
            'need' => (int)$need,
            'simple' => (int)$simple
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/power-supply-ranking
     * 电源天梯排行榜数据
     * @return array API 返回的 JSON 数组
     */
    public function powerSupplyRanking()
    {
        $path = '/resource/v1/power/data';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/epic-free-games
     * EpicGame 免费游戏获取（喜加一）
     * @param string $lang 语言 cn:中文 en:英文
     * @return array API 返回的 JSON 数组
     */
    public function epicFreeGames($lang = 'cn')
    {
        $path = '/resource/v1/epic/free/game';
        $params = [
            'lang' => (string)$lang
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/coin-toss
     * 随机抛硬币决策
     * @param string $type 输出类型 json:json数据 audio:直接输出音频
     * @return array API 返回的 JSON 数组
     */
    public function coinToss($type = 'json')
    {
        $path = '/resource/v1/flip/coin';
        $params = [
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tencent-cloud-articles
     * 腾讯云开发者社区文章内容解析获取
     * @param string $url 文章链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function tencentCloudArticle($url)
    {
        $path = '/resource/v1/cloud/tencent/article/get';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/cpu-ranking
     * CPU 天梯排行榜数据获取
     * @return array API 返回的 JSON 数组
     */
    public function cpuRanking()
    {
        $path = '/resource/v1/cpu/data';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/qqmusic-mid
     * QQ音乐MID获取（歌曲搜索）
     * @param string $keyword 搜索关键词（歌名 歌手，必填）
     * @return array API 返回的 JSON 数组
     */
    public function qqMusicMid($keyword)
    {
        $path = '/resource/v1/qqmusic/mid/get';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/pressure-unit-converter
     * 压力单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'mpa', 'bar', 'psi'（必填）
     * @param string $toUnit 目标单位代码，例如：'pa', 'kpa', 'bar'（必填）
     * @param int $precision 返回结果的小数点精度，默认 2（可选）
     * @return array API 返回的 JSON 数组
     */
    public function pressureUnitConverter($value, $fromUnit, $toUnit, $precision = 2)
    {
        $path = '/resource/v1/pressure/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/volume-unit-converter
     * 体积/容积单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'m3', 'l', 'us_gal'（必填）
     * @param string $toUnit 目标单位代码，例如：'m3', 'l', 'uk_gal'（必填）
     * @param int $precision 返回结果的小数点精度，默认 3（可选）
     * @return array API 返回的 JSON 数组
     */
    public function volumeUnitConverter($value, $fromUnit, $toUnit, $precision = 3)
    {
        $path = '/resource/v1/volume/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/power-unit-converter
     * 功率单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'w', 'kw', 'ps'（必填）
     * @param string $toUnit 目标单位代码，例如：'w', 'hp', 'btu/h'（必填）
     * @param int $precision 返回结果的小数点精度，默认 2（可选）
     * @return array API 返回的 JSON 数组
     */
    public function powerUnitConverter($value, $fromUnit, $toUnit, $precision = 2)
    {
        $path = '/resource/v1/power/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/phev-cost-calculator
     * 增程车油电使用费用计算
     * @param float $electric_distance 纯电行驶里程(km)
     * @param float $fuel_distance 燃油行驶里程(km)
     * @param float $electricity_price 电价(元/kWh)
     * @param float $fuel_price 油价(元/L)
     * @param float $electric_consumption 电耗(kWh/100km)，默认20.0
     * @param float $fuel_consumption 油耗(L/100km)，默认6.0
     * @return array API 返回的 JSON 数组
     */
    public function phevCostCalculator($electric_distance, $fuel_distance, $electricity_price, $fuel_price, $electric_consumption = 20.0, $fuel_consumption = 6.0)
    {
        $path = '/resource/v1/energy/car/cost/calc';
        $params = [
            'electric_distance' => (float)$electric_distance,
            'fuel_distance' => (float)$fuel_distance,
            'electricity_price' => (float)$electricity_price,
            'fuel_price' => (float)$fuel_price,
            'electric_consumption' => (float)$electric_consumption,
            'fuel_consumption' => (float)$fuel_consumption
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/length-unit-converter
     * 长度单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'m', 'km', 'mi'（必填）
     * @param string $toUnit 目标单位代码，例如：'mm', 'in', 'ft'（必填）
     * @param int $precision 返回结果的小数点精度，默认 6（可选）
     * @return array API 返回的 JSON 数组
     */
    public function lengthUnitConverter($value, $fromUnit, $toUnit, $precision = 6)
    {
        $path = '/resource/v1/length/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/area-unit-converter
     * 面积单位全维转换
     * @param float $value 需要进行转换的面积数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'square_meter', 'acre', 'mu'（可选，默认'square_meter'）
     * @param string $toUnit 目标单位代码，例如：'square_kilometer', 'square_foot', 'tsubo'（必填）
     * @param int $precision 返回结果的小数点精度，默认 2（可选）
     * @return array API 返回的 JSON 数组
     */
    public function areaUnitConverter($value, $fromUnit, $toUnit, $precision = 2)
    {
        $path = '/resource/v1/area/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/temperature-converter
     * 温度单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'c', 'f', 'k'（必填）
     * @param string $toUnit 目标单位代码，例如：'f', 'k', 'r'（必填）
     * @param int $precision 返回结果的小数点精度，默认 2（可选）
     * @return array API 返回的 JSON 数组
     */
    public function temperatureConverter($value, $fromUnit, $toUnit, $precision = 2)
    {
        $path = '/resource/v1/temperature/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/weight-unit-converter
     * 重量单位转换
     * @param float $value 需要进行转换的数值（必填）
     * @param string $fromUnit 原始单位代码，例如：'kg', 'g', 'lb'（必填）
     * @param string $toUnit 目标单位代码，例如：'g', 'oz', 't'（必填）
     * @param int $precision 返回结果的小数点精度，默认 4（可选）
     * @return array API 返回的 JSON 数组
     */
    public function weightUnitConverter($value, $fromUnit, $toUnit, $precision = 4)
    {
        $path = '/resource/v1/weight/converter';
        $params = [
            'value' => (float)$value,
            'from_unit' => (string)$fromUnit,
            'to_unit' => (string)$toUnit,
            'precision' => (int)$precision
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/chinese-idioms
     * 成语查询服务
     * @param string $keyword 成语关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function chineseIdioms($keyword)
    {
        $path = '/resource/v1/chengyu/query';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/history-of-today
     * 历史上的今天查询
     * @return array API 返回的 JSON 数组
     */
    public function historyOfToday()
    {
        $path = '/resource/v1/history/today';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/history-of-yesterday
     * 历史上的昨天查询
     * @return array API 返回的 JSON 数组
     */
    public function historyOfYesterday()
    {
        $path = '/resource/v1/history/yesterday';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/qq-level-badge
     * QQ等级数字转换图像（太阳/月亮/星星图标）
     * @param int $level QQ等级 1-256（必填）
     * @return mixed 图片二进制或API响应数组
     */
    public function qqLevelToImage($level)
    {
        $path = '/resource/v1/qq/level/to/image';
        $params = [
            'level' => (int)$level
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/historical-figures-bio
     * 历史古人传记数据查询
     * @param string $keywords 检索关键字（必填）
     * @return array API 返回的 JSON 数组
     */
    public function historicalFiguresBio($keywords)
    {
        $path = '/resource/v1/guren/information';
        $params = [
            'keywords' => (string)$keywords
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/barcode69-generator-pro
     * 商品条形码69码生成【Pro】
     * @param string $number 69码数字（必填）
     * @param string $type 输出类型 image/json（可选，默认image）
     * @return array API 返回的 JSON 数组
     */
    public function barcode69GeneratorPro($number, $type = 'image')
    {
        $path = '/resource/v1/barcode/pro/create';
        $params = [
            'number' => (string)$number,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/mortgage-calculator
     * 多类型房贷贷款还款计算
     * @param string $total 贷款总额（必填）
     * @param int $year 贷款年数（必填）
     * @param string $rate 年利率（必填）
     * @param int $type 计算类型 1等额本息 2等额本金（必填）
     * @return array API 返回的 JSON 数组
     */
    public function mortgageCalculator($total, $year, $rate, $type)
    {
        $path = '/resource/v1/accumulation/fund/calc';
        $params = [
            'total' => (string)$total,
            'year' => (int)$year,
            'rate' => (string)$rate,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/hourly-voice-alert
     * 整点语音播报提醒
     * @return array API 返回的 JSON 数组
     */
    public function hourlyVoiceAlert()
    {
        $path = '/resource/v1/hourly/voice/announcement';
        return $this->client->execute('GET', $path);
    }


    /**
     * https://api.istero.com/service/doc/express-delivery-tracker
     * 全国快递物流轨迹查询
     * @param string $com 快递公司编码（必填）
     * @param string $num 快递单号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function expressDeliveryTracker($com, $num)
    {
        $path = '/resource/v1/kuaidi/query';
        $params = [
            'com' => (string)$com,
            'num' => (string)$num
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/vehicle-price-checker
     * 车辆价格信息查询（购车/二手车行情评估）
     * @param string $car 车辆名称型号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function vehiclePriceChecker($car)
    {
        $path = '/resource/v1/car/price';
        $params = [
            'car' => (string)$car
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/life-progress-tracker
     * 人生进度计算（根据生日与预测年份计算时光进度）
     * @param string $birthday 生日信息（Y-m-d 或 Y/m/d，必填）
     * @param string $year 假设自己能活多少年（必填）
     * @return array API 返回的 JSON 数组
     */
    public function lifeProgressTracker($birthday, $year)
    {
        $path = '/resource/v1/life/countdown';
        $params = [
            'birthday' => (string)$birthday,
            'year' => (string)$year
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/leap-year-checker
     * 平年闰年判断（公历规则检测指定年份）
     * @param int $year 待查询年份（必填）
     * @return array API 返回的 JSON 数组
     */
    public function leapYearChecker($year)
    {
        $path = '/resource/v1/leap/year';
        $params = [
            'year' => (int)$year
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/image-url-to-base64
     * 图片URL转Base64编码
     * @param string $url 图片网络地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function imageUrlToBase64($url)
    {
        $path = '/resource/v1/images/base64';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-male-avatars
     * 随机获取男生头像（支持图片直出/JSON返回地址）
     * @param string $type 输出类型（可选，image：图片输出，json：JSON输出）
     * @return array API 返回的 JSON 数组
     */
    public function randomMaleAvatars($type = null)
    {
        $path = '/resource/v1/boy/rand/avatar';
        $params = [];
        if ($type !== null) {
            $params['type'] = (string)$type;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-female-avatars
     * 随机获取女生头像（支持7种风格类型）
     * @param int $type 头像风格类型（可选，1-7，默认1）
     * @return array API 返回的 JSON 数组
     */
    public function randomGilrsAvatars($type = null)
    {
        $path = '/resource/v1/girl/avatar/get';
        $params = [];
        if ($type !== null) {
            $params['type'] = (int)$type;
        }
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/bank-card-info
     * 银行卡信息查询（开户行、卡种、类型）
     * @param string $number 银行卡号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function bankCardInfo($number)
    {
        $path = '/resource/v1/bank/number/query';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ai-sensitive-word-filter
     * AI敏感词检测过滤
     * @param string $content 待检测文本内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function aiSensitiveWordFilter($content)
    {
        $path = '/resource/v1/sensitive/check';
        $params = [
            'content' => (string)$content
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/pan-resource-search
     * 主流网盘资源（影视等资源）搜索
     * @param string $keywords 资源关键字
     * @param string $disk 网盘类型 0：阿里云盘 1：夸克网盘 2：百度网盘 3：迅雷网盘
     * @param string $type 资源类型 0：影视 1：软件 2：书籍 3：游戏
     * @return array API 返回的 JSON 数组
     */
    public function diskSourceSearch($keywords, $disk, $type)
    {
        $path = '/resource/v1/disk/source/search';
        $params = [
            'keywords' => (string)$keywords,
            'disk' => (int)$disk,
            'type' => (int)$type,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/chinese-to-pinyin
     * 汉字转拼音转换
     * @param string $text 待转换的中文字符串
     * @return array API 返回的 JSON 数组
     */
    public function chineseToPinyin($text)
    {
        $path = '/resource/v1/pinyin/convert';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/qrcode-generator
     * 二维码QrCode快速生成
     * @param string $text 需要生成的内容（必填）
     * @param string $type 输出类型，image：图片输出，json：返回base64（可选）
     * @return array API 返回的 JSON 数组
     */
    public function qrcodeGenerator($text, $type = null)
    {
        $path = '/resource/v1/qrcode/create';
        $params = [
            'text' => (string)$text
        ];
        if ($type !== null) {
            $params['type'] = (string)$type;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-email-generator
     * 随机邮箱批量生成接口
     * @param int $type 生成类型
     * @param string $domain 邮箱域名后缀
     * @param int $length 邮箱长度
     * @param int $count 生成数量
     * @return array API 返回的 JSON 数组
     */
    public function randomEmailGenerator($type, $domain, $length, $count)
    {
        $path = '/resource/v1/create/mail/rand';
        $params = [
            'type' => (int)$type,
            'domain' => (string)$domain,
            'length' => (int)$length,
            'count' => (int)$count
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/xiehouyu-query
     * 歇后语关键字智能匹配查询
     * @param string $text 歇后语关键字（必填）
     * @return array API 返回的 JSON 数组
     */
    public function xiehouyuQuery($text)
    {
        $path = '/resource/v1/xiehouyu/query';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/phone-number-checker
     * 手机号码归属地、运营商信息查询
     * @param string $number 待查询手机号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function phoneNumberChecker($number)
    {
        $path = '/resource/v1/phone/check';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/daily-jokes
     * 获取每日随机笑话
     * @return array API 返回的 JSON 数组
     */
    public function dailyJokes()
    {
        $path = '/resource/v1/joke/today';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/random-chinese-idioms
     * 获取随机成语（含名称、拼音、解释）
     * @return array API 返回的 JSON 数组
     */
    public function randomChineseIdioms()
    {
        $path = '/resource/v1/chengyu/get';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/book-of-answers
     * 答案之书趣味解答
     * @param string $question 想要咨询的问题（必填）
     * @return array API 返回的 JSON 数组
     */
    public function bookOfAnswers($question)
    {
        $path = '/resource/v1/answersbook';
        $params = [
            'question' => (string)$question
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/universal-translation-api
     * 通用主流翻译（多国语言互译）
     * @param string $text 待翻译文本（必填）
     * @param string $type 翻译类型（可选，默认auto）
     * @return array API 返回的 JSON 数组
     */
    public function universalTranslate($text, $type = 'auto')
    {
        $path = '/resource/v1/translate';
        $params = [
            'text' => (string)$text,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/historical-figures-biography
     * 历史人物生平查询（含简介、事迹、时代背景、影响力）
     * @param string $name 历史人物姓名（必填）
     * @return array API 返回的 JSON 数组
     */
    public function getHistoricalFigure($name)
    {
        $path = '/resource/v1/historical/figure';
        $params = [
            'name' => (string)$name
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/garbage-classification
     * 垃圾分类查询（输入物品名称返回分类结果）
     * @param string $keyword 物品关键词（必填）
     * @param int $type 查询类型 0=模糊 1=精准（可选，默认0）
     * @return array API 返回的 JSON 数组
     */
    public function garbageClassification($keyword, $type = 0)
    {
        $path = '/resource/v1/rubbish/query';
        $params = [
            'keyword' => (string)$keyword,
            'type' => (int)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/wifi-qrcode-generator
     * WIFI二维码生成（扫码快速连网）
     * @param string $ssid WIFI名称（必填）
     * @param string $password WIFI密码（必填）
     * @param int $net 网络类型 1=WPA/WPA2 2=WEP（可选，默认1）
     * @param string $type 输出格式 image=图片 json=base64（可选，默认image）
     * @return array API 返回的 JSON 数组
     */
    public function createWifiQrcode($ssid, $password, $net = 1, $type = 'image')
    {
        $path = '/resource/v1/wifi/qrcode/create';
        $params = [
            'ssid' => (string)$ssid,
            'password' => (string)$password,
            'net' => (int)$net,
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/internet-slang-lookup
     * 网络用语简称查询（覆盖500+流行词汇）
     * @param string $text 网络用语简称（必填）
     * @return array API 返回的 JSON 数组
     */
    public function internetSlangLookup($text)
    {
        $path = '/resource/v1/net/abb';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bank-interest-calculator
     * 银行存款本金利息计算（支持定期/活期收益测算）
     * @param float $principal 存款本金（必填）
     * @param float $rate 年利率（必填）
     * @param int $month 存款周期（月，必填）
     * @return array API 返回的 JSON 数组
     */
    public function bankInterestCalculator($principal, $rate, $month)
    {
        $path = '/resource/v1/interest/calc';
        $params = [
            'principal' => (float)$principal,
            'rate' => (float)$rate,
            'month' => (int)$month
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-name-generator
     * 随机姓名生成（支持指定姓氏与名字位数）
     * @param string $first 姓氏（必填）
     * @param int $count 名字位数（必填，最大3）
     * @return array API 返回的 JSON 数组
     */
    public function randomNameGenerator($first, $count)
    {
        $path = '/resource/v1/create/name/rand';
        $params = [
            'first' => (string)$first,
            'count' => (int)$count
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/rmb-uppercase-converter
     * 人民币大写金额转换（财务专用）
     * @param float $money 需转换的金额数值（必填）
     * @return array API 返回的 JSON 数组
     */
    public function rmbUppercaseConverter($money)
    {
        $path = '/resource/v1/chinese/capital';
        $params = [
            'money' => (float)$money
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/what-to-eat-today
     * 今日随机美食推荐
     * @return array API 返回的 JSON 数组
     */
    public function whatToEatToday()
    {
        $path = '/resource/v1/eat/what';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/doubao-image-resolver
     * 豆包AI超清无水印图片解析获取
     * @param string $url 豆包AI分享图链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function doubaoImageResolver($url)
    {
        $path = '/resource/v1/parse/doubao/images';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/love-pickup-lines
     * 获取土味情话（随机生成）
     * @return array API 返回的 JSON 数组
     */
    public function lovePickupLines()
    {
        $path = '/resource/v1/love/talk';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/honor-of-kings-heroes
     * 王者荣耀英雄资料获取（含信息、图片、语音）
     * @param string $keyword 英雄关键字（必填）
     * @return array API 返回的 JSON 数组
     */
    public function honorOfKingsHeroes($keyword)
    {
        $path = '/resource/v1/pvp/hero/data';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/math-formula-generator
     * 复杂数学计算公式生成
     * @param int $number 一千万以内正整数（必填）
     * @return array API 返回的 JSON 数组
     */
    public function mathFormulaGenerator($number)
    {
        $path = '/resource/v1/complex/math/formula/generate';
        $params = [
            'number' => (int)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-profile
     * 随机人设数据生成（姓名、性格、职业等）
     * @param string|null $gender 性别（男/女，可选）
     * @return array API 返回的 JSON 数组
     */
    public function randomProfile($gender = null)
    {
        $path = '/resource/v1/persona/rand';
        $params = [];
        if ($gender !== null) {
            $params['gender'] = (string)$gender;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-douyin-girls
     * 随机获取抖音小姐姐视频
     * @return array API 返回的 JSON 数组
     */
    public function randomDouyinGirls()
    {
        $path = '/resource/v1/douyin/video/rand';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/love-apartment-quotes
     * 爱情公寓经典台词（随机获取）
     * @return array API 返回的 JSON 数组
     */
    public function loveApartmentQuotes()
    {
        $path = '/resource/v1/love/apartment';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/superpower-generator
     * 随机生成超能力信息（含能力+副作用）
     * @return array API 返回的 JSON 数组
     */
    public function superpowerGenerator()
    {
        $path = '/resource/v1/superpower/rand';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/social-share-api
     * 社交分享组件服务（生成多平台分享链接）
     * @param string $title 文章标题（必填）
     * @param string $url 文章URL地址（必填）
     * @param string|null $description 描述内容（小于200字，可选）
     * @return array API 返回的 JSON 数组
     */
    public function socialShareApi($title, $url, $description = null)
    {
        $path = '/resource/v1/social/share';
        $params = [
            'title' => (string)$title,
            'url' => (string)$url
        ];
        if ($description !== null) {
            $params['description'] = (string)$description;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/chinese-dynasties
     * 中国历史朝代数据获取
     * @return array API 返回的 JSON 数组
     */
    public function getChineseDynasties()
    {
        $path = '/resource/v1/get/dynasties';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/chinese-emperors
     * 中国历代帝王数据获取
     * @param string $keyword 搜索关键字（必填）
     * @param string $dynasty 朝代（可选）
     * @param int $page 页码，默认1（可选）
     * @return array API 返回的 JSON 数组
     */
    public function getChineseEmperors($keyword, $dynasty = '', $page = 1)
    {
        $path = '/resource/v1/get/emperors';
        $params = [
            'keyword' => (string)$keyword
        ];
        if (!empty($dynasty)) {
            $params['dynasty'] = (string)$dynasty;
        }
        if (!empty($page)) {
            $params['page'] = (int)$page;
        }
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/express-delivery-restrictions
     * 快递停发区域查询
     * @param string $province 省份（必填）
     * @param string $city 城市（必填）
     * @param string $area 区（必填）
     * @param string $address 详细地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function queryExpressDeliveryRestrictions($province, $city, $area, $address)
    {
        $path = '/resource/v1/kuaidi/receive';
        $params = [
            'province' => (string)$province,
            'city' => (string)$city,
            'area' => (string)$area,
            'address' => (string)$address
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/hidden-poem-generator
     * 藏头诗藏尾诗快速生成
     * @param string $keywords 关键词（最大四个汉字，必填）
     * @param int $num 五言/七言 5=五言 7=七言（可选，默认5）
     * @param int $type 隐藏位置 1藏头2藏尾3藏中4递增5递减（可选，默认1）
     * @param int $type2 押韵方式 1双句一压2双句押韵3一三四押（可选，默认1）
     * @return array API 返回的 JSON 数组
     */
    public function hiddenPoemGenerator($keywords, $num = 5, $type = 1, $type2 = 1)
    {
        $path = '/resource/v1/acrostic/create';
        $params = [
            'keywords' => (string)$keywords,
            'num' => (int)$num,
            'type' => (int)$type,
            'type2' => (int)$type2
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/baidu-baike-data
     * 百度百科数据获取
     * @param string $keywords 搜索关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function baiduBaikeData($keywords)
    {
        $path = '/resource/v1/baidu/baike/data';
        $params = [
            'keywords' => (string)$keywords
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/taobao-suggestions
     * 淘宝搜索联想词查询
     * @param string $keyword 搜索关键词（必填）
     * @return array API 返回的 JSON 数组
     */
    public function taobaoSuggestions($keyword)
    {
        $path = '/resource/v1/taobao/suggest';
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/chinese-surnames-ranking
     * 百家姓排名搜索
     * @param string $surname 姓氏（必填）
     * @return array API 返回的 JSON 数组
     */
    public function chineseSurnamesRanking($surname)
    {
        $path = '/resource/v1/surname/rank';
        $params = [
            'surname' => (string)$surname
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/morse-decrypt
     * 摩斯电码解密转换
     * @param string $code 摩斯电码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function morseDecrypt($code)
    {
        $path = '/resource/v1/morse/decrypt';
        $params = [
            'code' => (string)$code
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/morse-encrypt
     * 摩斯电码加密转换
     * @param string $text 需要加密的明文（必填）
     * @return array API 返回的 JSON 数组
     */
    public function morseEncrypt($text)
    {
        $path = '/resource/v1/morse/encrypt';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/simple-math-generator
     * 简易数学计算公式生成
     * @param int $number 一千万以内正整数（必填）
     * @return array API 返回的 JSON 数组
     */
    public function simpleMathGenerator($number)
    {
        $path = '/resource/v1/math/formula/generate';
        $params = [
            'number' => (int)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/twitter-video-downloader
     * Twitter/X视频解析下载
     * @param string $url 视频地址URL（必填）
     * @return array API 返回的 JSON 数组
     */
    public function downloadTwitterVideo($url)
    {
        $path = '/resource/v1/twitter/video/downloader';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/video-parser-v2
     * 全平台短视频解析V2版
     * @param string $url 短视频地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function videoAnalysisV2($url)
    {
        $path = '/resource/v2/video/analysis';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/identity-check
     * 身份证OCR识别及信息核验服务
     * @param string $idcard 身份证号（与name、image_base64、Image_url三选一）
     * @param string $name 姓名（与idcard配对）
     * @param string $image_base64 身份证图片Base64
     * @param string $Image_url 身份证图片URL
     * @return array API 返回的 JSON 数组
     */
    public function checkIdentity($idcard = '', $name = '', $image_base64 = '', $Image_url = '')
    {
        $path = '/resource/v1/idcard/identity/check';
        $params = [];

        if (!empty($idcard)) {
            $params['idcard'] = (string)$idcard;
        }
        if (!empty($name)) {
            $params['name'] = (string)$name;
        }
        if (!empty($image_base64)) {
            $params['image_base64'] = (string)$image_base64;
        }
        if (!empty($Image_url)) {
            $params['Image_url'] = (string)$Image_url;
        }

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/same-name-query-v2
     * 全国同名数据查询服务V2版
     * @param string $name 待查询姓名（必填）
     * @return array API 返回的 JSON 数组
     */
    public function querySameNameV2($name)
    {
        $path = '/resource/v2/china/same/name/query';
        $params = [
            'name' => (string)$name
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/phone-verification-two
     * 手机号码二要素验证
     * @param string $name 姓名（必填）
     * @param string $number 手机号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function verifyPhoneTwo($name, $number)
    {
        $path = '/resource/v1/real/phone/verify/two';
        $params = [
            'name' => (string)$name,
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bankcard-auth-three
     * 银行卡三要素核验服务
     * @param string $name 姓名（必填）
     * @param string $number 银行卡号（必填）
     * @param string $idcard 身份证号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function verifyBankCardThree($name, $number, $idcard)
    {
        $path = '/resource/v1/bank/card/verify/three';
        $params = [
            'name' => (string)$name,
            'number' => (string)$number,
            'idcard' => (string)$idcard
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bankcard-auth-two
     * 银行卡二要素核验服务
     * @param string $name 姓名（必填）
     * @param string $number 银行卡号（必填）
     * @return array API 返回的 JSON 数组
     */
    public function verifyBankCardTwo($name, $number)
    {
        $path = '/resource/v1/bank/card/verify/two';
        $params = [
            'name' => (string)$name,
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/mobile-status
     * 手机号在网状态查询
     * @param string $number 手机号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function getMobileStatus($number)
    {
        $path = '/resource/v1/phone/status';
        $params = [
            'number' => (string)$number
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/identity-verification-two
     * 身份信息认证（二要素核验）
     * @param string $name 姓名（必填）
     * @param string $idcard 身份证号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function verifyIdentityTwo($name, $idcard)
    {
        $path = '/resource/v1/idcard/verify/two';
        $params = [
            'name' => (string)$name,
            'idcard' => (string)$idcard
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/cigarette-price-checker
     * 香烟价格参数信息查询
     * @param string $name 香烟名称或关键字（必填）
     * @return array API返回的JSON数组
     */
    public function cigarettePriceChecker($name)
    {
        $path = '/resource/v1/cigarette/price';
        $params = [
            'name' => (string)$name
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/universities-pro
     * 全国高校数据查询【Pro】
     * @param string|null $name 高校名称
     * @param int|null $page 页数
     * @param string|null $location 所在地（省份）
     * @param string|null $nature 学校性质
     * @param string|null $type 学校类型
     * @param int|null $is_985 是否为985
     * @param int|null $is_211 是否为211
     * @param int|null $is_top 是否为一流院校
     * @param int|null $is_top_subject 是否有一流学科
     * @param int|null $is_independent_institutions 是否有独立院校
     * @param int|null $is_higher 是否为示范高职院校
     * @param int|null $is_civilian_run 是否为民办学校
     * @param int|null $is_accept_vocational 是否招收专科
     * @param int|null $is_accept_dr 是否招收博士
     * @param int|null $is_accept_master 是否招收硕士
     * @param int|null $is_accept_undergraduate 是否招收本科
     * @return array API 返回的 JSON 数组
     */
    public function universitiesPro(
        $name = null,
        $page = null,
        $location = null,
        $nature = null,
        $type = null,
        $is_985 = null,
        $is_211 = null,
        $is_top = null,
        $is_top_subject = null,
        $is_independent_institutions = null,
        $is_higher = null,
        $is_civilian_run = null,
        $is_accept_vocational = null,
        $is_accept_dr = null,
        $is_accept_master = null,
        $is_accept_undergraduate = null
    )
    {
        $path = '/resource/v1/school/query/plus';
        $params = [];
        if (!is_null($name)) $params['name'] = (string)$name;
        if (!is_null($page)) $params['page'] = (int)$page;
        if (!is_null($location)) $params['location'] = (string)$location;
        if (!is_null($nature)) $params['nature'] = (string)$nature;
        if (!is_null($type)) $params['type'] = (string)$type;
        if (!is_null($is_985)) $params['is_985'] = (int)$is_985;
        if (!is_null($is_211)) $params['is_211'] = (int)$is_211;
        if (!is_null($is_top)) $params['is_top'] = (int)$is_top;
        if (!is_null($is_top_subject)) $params['is_top_subject'] = (int)$is_top_subject;
        if (!is_null($is_independent_institutions)) $params['is_independent_institutions'] = (int)$is_independent_institutions;
        if (!is_null($is_higher)) $params['is_higher'] = (int)$is_higher;
        if (!is_null($is_civilian_run)) $params['is_civilian_run'] = (int)$is_civilian_run;
        if (!is_null($is_accept_vocational)) $params['is_accept_vocational'] = (int)$is_accept_vocational;
        if (!is_null($is_accept_dr)) $params['is_accept_dr'] = (int)$is_accept_dr;
        if (!is_null($is_accept_master)) $params['is_accept_master'] = (int)$is_accept_master;
        if (!is_null($is_accept_undergraduate)) $params['is_accept_undergraduate'] = (int)$is_accept_undergraduate;
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/xiaohongshu-article
     * 小红书文章详情获取（标题、内容、图片、作者、互动数据）
     * @param string $url 小红书文章链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function xiaohongshuArticle($url)
    {
        $path = '/resource/v1/red/book/detail/get';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/random-riddles
     * 随机获取谜语（含谜面+谜底）
     * @return array API 返回的 JSON 数组
     */
    public function randomRiddles()
    {
        $path = '/resource/v1/riddle/query';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/random-ip-generator
     * 随机生成IP地址
     * @param string $type ip烈性
     * @return array API 返回的 JSON 数组
     */
    public function randomIpGenerator($type)
    {
        $path = '/resource/v1/random/ip';
        $params = [
            'type' => (string)$type
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/happy8-draw-query
     * 快乐8开奖数据查询
     * @return array API 返回的 JSON 数组
     */
    public function happy8DrawQuery()
    {
        $path = '/resource/v1/happy8/draw/query';
        return $this->client->execute('POST', $path, []);
    }

    /**
     * https://api.istero.com/service/doc/universities-data
     * 全国高校数据查询（查询学校名称、所在地、211/985等）
     * @param string $keyword 查询关键词（必填）
     * @param int $page 页码
     * @return array API 返回的 JSON 数组
     */
    public function universitiesData($keyword, $page = 1)
    {
        $path = '/resource/v1/collage/query';
        $params = [
            'keyword' => (string)$keyword,
            'page' => (int)$page
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/douban-group-discussion
     * 豆瓣小组讨论精选内容获取（热门小组讨论列表）
     * @return array API 返回的 JSON 数组
     */
    public function doubanGroupDiscussion()
    {
        $path = '/resource/v1/douban/group/discussion';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/lottery-results-query
     * 福彩七彩乐（七乐彩）开奖结果查询（最新一期或多期历史开奖）
     * @return array API 返回的 JSON 数组
     */
    public function lotteryResultsQuery()
    {
        $path = '/resource/v1/fucai/qlc/query';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/crypto-price-query
     * 热门加密货币交易价格获取（全球主流数字货币实时行情）
     * @return array API 返回的 JSON 数组
     */
    public function cryptoPriceQuery()
    {
        $path = '/resource/v1/crypto/query';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/nickname-get-v1
     * 随机昵称获取（适用于社交账号、游戏角色）
     * @return array API返回的JSON数组，包含nickname字段
     */
    public function nicknameGetV1()
    {
        $path = '/resource/v1/nickname/get';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/lottery-double-color
     * 福彩双色球开奖查询（支持展示15天内历史记录）
     * @return array API返回的JSON数组，包含开奖详情
     */
    public function lotteryDoubleColor()
    {
        $path = '/resource/v1/fucai/ssq/query';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/lottery-3d
     * 福彩3D开奖查询（支持展示15天内历史记录）
     * @return array API返回的JSON数组，包含开奖详情
     */
    public function lottery3d()
    {
        $path = '/resource/v1/fucai/3d/query';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/netease-article-fetch
     * 网易（163）文章内容获取
     * @param string $url 网易文章链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function neteaseArticleFetch($url)
    {
        $path = '/resource/v1/article/163/get';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/id-card-verification
     * 身份证验证
     * @param string $name 姓名（必填）
     * @param string $id_card 身份证号码（必填）
     * @return array API 返回的 JSON 数组
     */
    public function idCardVerification($name, $id_card)
    {
        $path = '/resource/v1/idcard/check';
        $params = [
            'name' => (string)$name,
            'id_card' => (string)$id_card
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tencent-news-fetch
     * 腾讯新闻内容获取
     * @param string $url 腾讯新闻链接（必填）
     * @return array API 返回的 JSON 数组
     */
    public function tencentNewsFetch($url)
    {
        $path = '/resource/v1/article/tencent/get';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * 搜狗联想关键词获取
     * Doc: https://api.istero.com/service/doc/sogou-suggestions
     * @param string $keyword 搜索关键词
     * @return array
     */
    public function sogouSuggestions($keyword)
    {
        $path = '/resource/v1/sogou/keywords'; // 严格取自文档“接口地址”栏
        $params = [
            'keyword' => (string)$keyword
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/currency-converter
     * 多类型货币金额大小写转换（支持10种主流货币，输出标准财务大写格式）
     * @param float $amount 要转换的金额（必填）
     * @param string $currency 货币代码（CNY,HKD,USD,EUR,GBP,JPY,AUD,CAD,SGD,KRW）（必填）
     * @param string $format 输出格式: english/chinese（必填）
     * @return array API 返回的 JSON 数组
     */
    public function currencyConverter($amount, $currency, $format)
    {
        $path = '/resource/v1/dollar/convert/text';
        $params = [
            'amount' => (float)$amount,
            'currency' => (string)$currency,
            'format' => (string)$format
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/short-video-search
     * 全网影视短剧搜索，支持全网10000+影视短剧搜索，返回网盘观看地址
     * @param string $text 搜索的影视剧关键字（必填）
     * @return array API 返回的 JSON 数组
     */
    public function shortVideoSearch($text)
    {
        $path = '/resource/v1/short/play';
        $params = [
            'text' => (string)$text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/missing-child-find-api
     * 宝贝回家公益服务
     * @return array API 返回的 JSON 数组
     */
    public function babyComeHome()
    {
        $path = '/resource/v1/baby/come/home';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/website-screenshot
     * 网页截图，传入目标URL返回截图图片
     * @param string $url 要截图的网页完整地址，需带 http(s)://（必填）
     * @return array API 返回的 JSON 数组
     */
    public function websiteScreenshot($url)
    {
        $path = '/resource/v1/website/screenshot';
        $params = [
            'url' => (string)$url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/kfc-crazy-thursday-text
     * KFC疯狂星期四文案，随机获取趣味段子文案
     * @return array API 返回的 JSON 数组
     */
    public function kfcCrazyThursdayText()
    {
        $path = '/resource/v1/kfc/word';
        return $this->client->execute('POST', $path);
    }

    /**
     * https://api.istero.com/service/doc/global-movie-box-office-rank-api
     * 猫眼电影全球影视票房榜，获取全球电影实时票房排行数据
     * @return array API 返回的 JSON 数组
     */
    public function globalMovieBoxOfficeRank()
    {
        $path = '/resource/v1/world/movie/top';
        return $this->client->execute('POST', $path);
    }


    /**
     * https://api.istero.com/service/doc/singduck-random-song
     * 唱鸭随机点歌服务，随机返回歌曲、歌词与播放链接
     * @return array API 返回的 JSON 数组
     */
    public function singduckRandomSong()
    {
        $path = '/resource/v1/sing/duck/music';
        return $this->client->execute('POST', $path);
    }

}
