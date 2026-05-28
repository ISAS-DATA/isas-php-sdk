<?php
/**
 * 功能说明：健康类服务组件
 *
 * @package isas-php-sdk
 * @author VernonShao
 * @license MIT License
 * @link https://github.com/ISAS-DATA/isas-php-sdk
 */
namespace Isas\Sdk\Services;

use Isas\Sdk\BaseService;

class Health extends BaseService
{
    /**
     * https://api.istero.com/service/doc/safe-period-calculator
     * 安全期计算
     * @param string $period_date 本次月经第一天日期
     * @param int $cycle_length 月经周期总天数
     * @param int $period_length 经期持续天数
     * @return array API 返回的 JSON 数组
     */
    public function safePeriodCalculator($period_date, $cycle_length, $period_length)
    {
        $path = '/resource/v1/safe/period/calc';
        $params = [
            'period_date' => (string)$period_date,
            'cycle_length' => (int)$cycle_length,
            'period_length' => (int)$period_length
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/ideal-weight-calculator
     * 标准体重计算
     * @param int $gender 性别 1男 2女
     * @param string $height 身高（cm）
     * @param string $weight 体重（kg）
     * @return array API 返回的 JSON 数组
     */
    public function idealWeightCalculator($gender, $height, $weight)
    {
        $path = '/resource/v1/calculate/standard/weight';
        $params = [
            'gender' => (int)$gender,
            'height' => (string)$height,
            'weight' => (string)$weight
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/food-conflict-checker
     * 相克食物查询
     * @param string $food 食物关键字
     * @return array API 返回的 JSON 数组
     */
    public function foodConflictChecker($food)
    {
        $path = '/resource/v1/food/combinations';
        $params = [
            'food' => (string)$food
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/tdee
     * 每日所需热量消耗计算
     * @param int $age 年龄
     * @param int $gender 性别 1男 2女
     * @param int $weight 体重 kg
     * @param int $height 身高 cm
     * @param string $active 运动量系数
     * @return array API 返回的 JSON 数组
     */
    public function tdeeQuery($age, $gender, $weight, $height, $active)
    {
        $path = '/resource/v1/tdee/query';
        $params = [
            'age' => (int)$age,
            'gender' => (int)$gender,
            'weight' => (int)$weight,
            'height' => (int)$height,
            'active' => (string)$active
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/whtr
     * 腰高比计算
     * @param int $height 身高 cm
     * @param int $waist 腰围 cm
     * @return array API 返回的 JSON 数组
     */
    public function whtrCalc($height, $waist)
    {
        $path = '/resource/v1/body/wthr/calc';
        $params = [
            'height' => (int)$height,
            'waist' => (int)$waist
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bmr
     * 基础代谢率计算
     * @param int $age 年龄
     * @param int $gender 性别 1男 2女
     * @param int $weight 体重 kg
     * @param int $height 身高 cm
     * @return array API 返回的 JSON 数组
     */
    public function bmrQuery($age, $gender, $weight, $height)
    {
        $path = '/resource/v1/bmr/query';
        $params = [
            'age' => (int)$age,
            'gender' => (int)$gender,
            'weight' => (int)$weight,
            'height' => (int)$height
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/child-bloodtype-predictor
     * 子女血型预测
     * @param string $father 父亲血型
     * @param string $mother 母亲血型
     * @return array API 返回的 JSON 数组
     */
    public function childBloodtypePredictor($father, $mother)
    {
        $path = '/resource/v1/blood/query';
        $params = [
            'father' => (string)$father,
            'mother' => (string)$mother
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/food-calories-query
     * 食物卡路里查询
     * @param string $food 食物名称
     * @param int $page 分页页码
     * @return array API 返回的 JSON 数组
     */
    public function foodCaloriesQuery($food, $page = 1)
    {
        $path = '/resource/v1/food/calorie/query';
        $params = [
            'food' => (string)$food,
            'page' => (int)$page
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/child-height-predictor
     * 子女身高预测
     * @param string $father_height 父亲身高 cm
     * @param string $mother_height 母亲身高 cm
     * @param int $gender 孩子性别 1男 2女
     * @return array API 返回的 JSON 数组
     */
    public function childHeightPredictor($father_height, $mother_height, $gender)
    {
        $path = '/resource/v1/child/height/predict';
        $params = [
            'father_height' => (string)$father_height,
            'mother_height' => (string)$mother_height,
            'gender' => (int)$gender
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bmi
     * 身体质量指数计算
     * @param string $sex 性别
     * @param int $age 年龄
     * @param int $weight 体重
     * @param int $height 身高
     * @return array API 返回的 JSON 数组
     */
    public function bmiQuery($sex, $age, $weight, $height)
    {
        $path = '/resource/v1/bmi/query';
        $params = [
            'sex' => (string)$sex,
            'age' => (int)$age,
            'weight' => (int)$weight,
            'height' => (int)$height
        ];
        return $this->client->execute('POST', $path, $params);
    }

    /**
     * https://api.istero.com/service/doc/bfp
     * 体脂率计算
     * @param int $gender 性别 1男 2女
     * @param int $age 年龄
     * @param int $weight 体重 kg
     * @param int $height 身高 cm
     * @return array API 返回的 JSON 数组
     */
    public function bfpQuery($gender, $age, $weight, $height)
    {
        $path = '/resource/v1/bfp/query';
        $params = [
            'gender' => (int)$gender,
            'age' => (int)$age,
            'weight' => (int)$weight,
            'height' => (int)$height
        ];
        return $this->client->execute('POST', $path, $params);
    }

}