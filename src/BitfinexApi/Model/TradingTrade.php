<?php

namespace madmis\BitfinexApi\Model;

use madmis\BitfinexApi\Api;

/**
 * Class TradingTrade
 * @package madmis\BitfinexApi\Model
 */
class TradingTrade
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
     * sell or buy
     * @var string
     */
    protected $type = Api::BUY;

    /**
     * Price at which the trade was executed
     * @var float
     */
    protected $price;

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
     * Trade type: buy or sell
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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

