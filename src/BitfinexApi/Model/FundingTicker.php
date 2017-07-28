<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Model\Traits\TickerTrait;

/**
 * Class MarginTicker
 * @package madmis\BitfinexApi\Model
 */
class FundingTicker
{
    use TickerTrait;

    /**
     * @var string
     */
    protected $currency;

    /**
     * Flash Return Rate - average of all fixed rate funding over the last hour
     * @var float
     */
    protected $frr;

    /**
     * Bid period covered in days
     * @var int
     */
    protected $bidPeriod;

    /**
     * Ask period covered in days
     * @var int
     */
    protected $askPeriod;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Flash Return Rate - average of all fixed rate funding over the last hour
     * @return float
     */
    public function getFrr(): float
    {
        return $this->frr;
    }

    /**
     * @param float $frr
     */
    public function setFrr(float $frr): void
    {
        $this->frr = $frr;
    }

    /**
     * Bid period covered in days
     * @return int
     */
    public function getBidPeriod(): int
    {
        return $this->bidPeriod;
    }

    /**
     * @param int $bidPeriod
     */
    public function setBidPeriod(int $bidPeriod): void
    {
        $this->bidPeriod = $bidPeriod;
    }

    /**
     * Ask period covered in days
     * @return int
     */
    public function getAskPeriod(): int
    {
        return $this->askPeriod;
    }

    /**
     * @param int $askPeriod
     */
    public function setAskPeriod(int $askPeriod): void
    {
        $this->askPeriod = $askPeriod;
    }

    /**
     * @param string $currency
     * @param array $ticker
     * @return array
     */
    public static function convertToNamed(string $currency, array $ticker): array
    {
        array_unshift($ticker, $currency);
        return array_combine([
            'currency',
            'frr',
            'bid',
            'bidPeriod',
            'bidSize',
            'ask',
            'askPeriod',
            'askSize',
            'dailyChange',
            'dailyChangePerc',
            'lastPrice',
            'volume',
            'high',
            'low',
        ], $ticker);
    }
}
