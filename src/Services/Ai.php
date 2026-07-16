<?php
/**
 * 功能说明：AI类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */

namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Ai extends BaseService
{
    /**
     * https://api.istero.com/service/doc/doubao-ai-pro256k
     * 豆包AI pro-256k大语言模型对话接口
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function doubaoAiPro256k(string $text): array
    {
        $path = '/resource/v1/ai/doubao/pro/256k';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/doubao-ai-pro256k
     * 豆包AI pro-256k大语言模型对话接口
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function doubaoAiPro32k(string $text): array
    {
        $path = '/resource/v1/ai/doubao/pro/32k';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/doubao-ai-15-pro32k
     * 豆包AI 1.5-pro-32k大语言模型对话接口
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function doubaoAi15Pro32k(string $text): array
    {
        $path = '/resource/v1/ai/doubao/1_5/pro';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * AI智能中文语句分词
     * https://api.istero.com/service/doc/chinese-text-segmenter
     * @param string $text 待分词文本（最大支持 2000 字符）
     * @param string $dict 词典类型：small（默认，小词典）| big（大词典，仅 SVIP 可用）
     * @return array API 返回的 JSON 数组
     */
    public function chineseTextSegmenter(string $text, string $dict = 'small')
    {
        $path = '/resource/v1/chinese/smart/segment';
        $params = [
            'text' => $text,
            'dict' => in_array($dict, ['small', 'big']) ? $dict : 'small'
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ai-address-recognizer-v2
     * AI收货地址智能解析V2（提取姓名、电话、省市区、详细地址）
     * @param string $address 完整收货地址文本（必填）
     * @return array API 返回的 JSON 数组
     */
    public function aiAddressRecognizerV2(string $address): array
    {
        $path = '/resource/v2/parse/address';
        $params = [
            'address' => $address
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tongyi-audio-model
     * 通义AI大规模音频语言理解模型（qwen-audio-turbo）
     * @param string $text 诉求指令（必填）
     * @param string $audioUrl 音频地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiAudioModel(string $text, string $audioUrl): array
    {
        $path = '/resource/v1/tongyi/ai/autio/turbo';
        $params = [
            'text' => $text,
            'audioUrl' => $audioUrl
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/deepseek-r1-llama8b
     * DeepSeek-R1-Llama-8B大语言模型对话接口
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function deepseekR1Llama8b(string $text): array
    {
        $path = '/resource/v1/deepseek/r1/llama/8b';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tongyi-qwq-32b
     * 通义AI QwQ-32B大模型对话接口
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiQwq32b(string $text): array
    {
        $path = '/resource/v1/qwq/32b/preview/tongyi/ai';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tongyi-vl-plus
     * 通义AI VL-Plus大语言模型（视觉语言增强版）
     * @param string $text 对话内容（必填，100个tokens）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiVlPlus(string $text): array
    {
        $path = '/resource/v1/vl/plus/tongyi/ai';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tongyi-qwen-ocr
     * 通义AI Qwen-OCR图像文字识别
     * @param string $image 图片URL地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiQwenOcr(string $image): array
    {
        $path = '/resource/v1/tongyi/ocr/vl';
        $params = [
            'image' => $image
        ];
        return $this->client->execute('POST', $path, $params);
    }


    /**
     * https://api.istero.com/service/doc/tongyi-qwen-max
     * 通义AI Qwen-Max大语言模型（复杂任务对话）
     * @param string $text 对话内容（必填，100个tokens）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiQwenMax(string $text): array
    {
        $path = '/resource/v1/max/tongyi/ai';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tongyi-qwen25-32b
     * 通义AI Qwen2.5-32B大语言模型
     * @param string $text 对话内容（必填，150个tokens）
     * @return array API 返回的 JSON 数组
     */
    public function tongyiQwen37_plus(string $text): array
    {
        $path = '/resource/v1/ai/tongyi/conversation';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ai-nsfw-detector
     * AI智能鉴黄鉴别成人内容（图片NSFW检测）
     * @param string $url 图片URL地址（必填）
     * @return array API 返回的 JSON 数组
     */
    public function aiNsfwDetector(string $url): array
    {
        $path = '/resource/v1/yellow/check';
        $params = [
            'url' => $url
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ai-turing-bot
     * AI图灵机器人智能对话
     * @param string $text 对话内容（必填）
     * @return array API 返回的 JSON 数组
     */
    public function aiTuringBot(string $text): array
    {
        $path = '/resource/v1/tuling/robot';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ai-sensitive-word-filter
     * AI智能敏感词检测过滤
     * @param string $text 需要检测的文本（必填）
     * @return array API 返回的 JSON 数组
     */
    public function aiSensitiveWordFilter(string $text): array
    {
        $path = '/resource/v1/car/sensitive/words';
        $params = [
            'text' => $text
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/glm-5-2-llm-chat
     * 智谱AI GLM-5.2 大语言模型对话
     *
     * @param string $text 对话内容（必填，约150 tokens）
     * @return array API 返回的 JSON 数组
     */
    public function glm52Chat(string $text): array
    {
        $path = '/resource/v1/glm/5_2';
        $params = [
            'text' => $text,
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/deepseek-v4-flash-llm
     * DeepSeek V4 Flash 大语言模型
     * @param string $text 对话内容
     * @return array
     */
    public function deepseekV4FlashChat(string $token, string $text): array
    {
        $path = '/resource/v1/deepseek/v4/flash';

        $params = [
            'token' => $token,
            'text' => $text,
        ];

        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/deepseek-v4-pro-llm-chat
     * DeepSeek V4 Pro 大语言模型
     * @param string $text 对话内容
     * @return array
     */
    public function deepseekV4ProChat(string $token, string $text): array
    {
        $path = '/resource/v1/deepseek/v4/pro';
        $params = [
            'token' => $token,
            'text' => $text,
        ];
        return $this->client->execute('POST', $path, $params);
    }


}