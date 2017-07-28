<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Model\Traits\TickerTrait;

/**
 * Class TradingTicker
 * @package madmis\BitfinexApi\Model
 */
class TradingTicker
{
    use TickerTrait;
    /**
     * Trade pair
     * @var string
     */
    protected $pair;

    /**
     * Trade pair
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @param string $pair
     */
    public function setPair(string $pair): void
    {
        $this->pair = $pair;
    }

    /**
     * @param string $pair
     * @param array $ticker
     * @return array
     */
    public static function convertToNamed(string $pair, array $ticker): array
    {
        array_unshift($ticker, $pair);
        return array_combine([
            'pair',
            'bid',
            'bidSize',
            'ask',
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
