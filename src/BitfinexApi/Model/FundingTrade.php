<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Api;

/**
 * Class FundingTrade
 * @package madmis\BitfinexApi\Model
 */
class FundingTrade
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Date
     * @var \DateTime
     */
    protected $mts;

    /**
     * @var float
     */
    protected $amount;

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
     * sell or buy
     * @var string
     */
    protected $type = Api::BUY;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     *
     * @return \DateTime
     */
    public function getMts(): \DateTime
    {
        return $this->mts;
    }

    /**
     * @param int $mts
     */
    public function setMts(int $mts): void
    {
        $this->mts = (new \DateTime())->setTimestamp($mts / 1000);
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->type = $amount < 0 ? Api::SELL : Api::BUY;

        $this->amount = abs($amount);
    }

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
     * Trade type: buy or sell
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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

