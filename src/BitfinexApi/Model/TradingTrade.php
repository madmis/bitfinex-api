<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Model\Traits\TradeTrait;

/**
 * Class TradingTrade
 * @package madmis\BitfinexApi\Model
 */
class TradingTrade
{
    use TradeTrait;

    /**
     * Price at which the trade was executed
     * @var float
     */
    protected $price;


    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Price at which the trade was executed
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * amount * price
     * @return float
     */
    public function getTotal(): float
    {
        return (float)bcmul($this->getAmount(), $this->getPrice(), 10);
    }

    /**
     * @param array $items
     * @return array
     */
    public static function convertToNamed(array $items): array
    {
        return array_map(function ($item) {
            return array_combine(['id', 'mts', 'amount', 'price'], $item);
        }, $items);
    }
}
