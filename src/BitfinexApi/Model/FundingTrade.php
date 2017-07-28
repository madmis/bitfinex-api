<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Model\Traits\TradeTrait;

/**
 * Class FundingTrade
 * @package madmis\BitfinexApi\Model
 */
class FundingTrade
{
    use TradeTrait;

    /**
     * Rate at which funding transaction occurred
     * @var float
     */
    protected $rate;

    /**
     * Amount of time the funding transaction was for
     * @var int
     */
    protected $period;

    /**
     * Rate at which funding transaction occurred
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Amount of time the funding transaction was for
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @param int $period
     */
    public function setPeriod(int $period): void
    {
        $this->period = $period;
    }

    /**
     * @param array $items
     * @return array
     */
    public static function convertToNamed(array $items): array
    {
        return array_map(function ($item) {
            return array_combine(['id', 'mts', 'amount', 'rate', 'period'], $item);
        }, $items);
    }
}

