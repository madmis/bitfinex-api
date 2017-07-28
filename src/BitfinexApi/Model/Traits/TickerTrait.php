<?php

namespace madmis\BitfinexApi\Model\Traits;

/**
 * Trait TickerTrait
 * @package madmis\BitfinexApi\Model\Traits
 */
trait TickerTrait
{
    /**
     * Price of last highest bid
     * @var float
     */
    protected $bid;

    /**
     * Size of the last highest bid
     * @var float
     */
    protected $bidSize;

    /**
     * Price of last lowest ask
     * @var float
     */
    protected $ask;

    /**
     * Size of the last lowest ask
     * @var float
     */
    protected $askSize;

    /**
     * Amount that the last price has changed since yesterday
     * @var float
     */
    protected $dailyChange;

    /**
     * Amount that the price has changed expressed in percentage terms
     * @var float
     */
    protected $dailyChangePerc;

    /**
     * Price of the last trade
     * @var float
     */
    protected $lastPrice;

    /**
     * Daily volume
     * @var float
     */
    protected $volume;

    /**
     * Daily high
     * @var float
     */
    protected $high;

    /**
     * Daily low
     * @var float
     */
    protected $low;

    /**
     * Price of last highest bid
     * @return float
     */
    public function getBid(): float
    {
        return $this->bid;
    }

    /**
     * @param float $bid
     */
    public function setBid(float $bid): void
    {
        $this->bid = $bid;
    }

    /**
     * Size of the last highest bid
     * @return float
     */
    public function getBidSize(): float
    {
        return $this->bidSize;
    }

    /**
     * @param float $bidSize
     */
    public function setBidSize(float $bidSize): void
    {
        $this->bidSize = $bidSize;
    }

    /**
     * Price of last lowest ask
     * @return float
     */
    public function getAsk(): float
    {
        return $this->ask;
    }

    /**
     * @param float $ask
     */
    public function setAsk(float $ask): void
    {
        $this->ask = $ask;
    }

    /**
     * Size of the last lowest ask
     * @return float
     */
    public function getAskSize(): float
    {
        return $this->askSize;
    }

    /**
     * @param float $askSize
     */
    public function setAskSize(float $askSize): void
    {
        $this->askSize = $askSize;
    }

    /**
     * Amount that the last price has changed since yesterday
     * @return float
     */
    public function getDailyChange(): float
    {
        return $this->dailyChange;
    }

    /**
     * @param float $dailyChange
     */
    public function setDailyChange(float $dailyChange): void
    {
        $this->dailyChange = $dailyChange;
    }

    /**
     * Amount that the price has changed expressed in percentage terms
     * @return float
     */
    public function getDailyChangePerc(): float
    {
        return $this->dailyChangePerc;
    }

    /**
     * @param float $dailyChangePerc
     */
    public function setDailyChangePerc(float $dailyChangePerc): void
    {
        $this->dailyChangePerc = $dailyChangePerc;
    }

    /**
     * Price of the last trade
     * @return float
     */
    public function getLastPrice(): float
    {
        return $this->lastPrice;
    }

    /**
     * @param float $lastPrice
     */
    public function setLastPrice(float $lastPrice): void
    {
        $this->lastPrice = $lastPrice;
    }

    /**
     * Daily volume
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume(float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * Daily high
     * @return float
     */
    public function getHigh(): float
    {
        return $this->high;
    }

    /**
     * @param float $high
     */
    public function setHigh(float $high): void
    {
        $this->high = $high;
    }

    /**
     * Daily low
     * @return float
     */
    public function getLow(): float
    {
        return $this->low;
    }

    /**
     * @param float $low
     */
    public function setLow(float $low): void
    {
        $this->low = $low;
    }
}
