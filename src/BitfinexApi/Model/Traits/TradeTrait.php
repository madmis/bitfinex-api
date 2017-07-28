<?php

namespace madmis\BitfinexApi\Model\Traits;

use madmis\BitfinexApi\Api;

/**
 * Trait TradeTrait
 * @package madmis\BitfinexApi\Model\Traits
 */
trait TradeTrait
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
     * Trade type: buy or sell
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
