<?php

namespace madmis\BitfinexApi\Endpoint;

use madmis\BitfinexApi\Api;
use madmis\BitfinexApi\Model\FundingTicker;
use madmis\BitfinexApi\Model\FundingTrade;
use madmis\BitfinexApi\Model\TradingTicker;
use madmis\BitfinexApi\Model\TradingTrade;
use madmis\ExchangeApi\Endpoint\AbstractEndpoint;
use madmis\ExchangeApi\Endpoint\EndpointInterface;
use madmis\ExchangeApi\Exception\ClientException;

/**
 * Class PublicEndpoint
 * @package madmis\BitfinexApi\Endpoint
 */
class PublicEndpoint extends AbstractEndpoint implements EndpointInterface
{
    /**
     * @param string $symbol
     * @param bool $isTrade
     * @return string
     */
    public function prefixSymbol(string $symbol, bool $isTrade = true): string
    {
        $symbol = strtoupper($symbol);

        return $isTrade ? "t{$symbol}" : "f{$symbol}";
    }

    /**
     * Shows you the current best bid and ask, as well as the last trade price
     * @param array $symbols
     * @return array
     * @throws ClientException
     */
    public function tickers(array $symbols): array
    {
        $options = [
            'query' => ['symbols' => implode(',', $symbols)],
        ];
        $response = $this->sendRequest(Api::GET, $this->getApiUrn(['tickers']), $options);

        return $response;
    }

    /**
     * Shows you the current best bid and ask, as well as the last trade price
     * @param string $symbol
     * @return array
     * @throws ClientException
     */
    public function ticker(string $symbol): array
    {
        return $this->sendRequest(Api::GET, $this->getApiUrn(['ticker', $symbol]));
    }

    /**
     * @param string $symbol trading pair without prefix
     * @param bool $mapping
     * @return array|TradingTicker
     * @throws ClientException
     */
    public function tradingTicker(string $symbol, bool $mapping = true)
    {
        $response = $this->ticker(
            $this->prefixSymbol($symbol)
        );

        if ($mapping && $response) {
            $response = $this->deserializeItem(
                TradingTicker::convertToNamed($symbol, $response),
                TradingTicker::class
            );
        }

        return $response;
    }

    /**
     * @param string $symbol funding currency symbol without prefix
     * @param bool $mapping
     * @return array|FundingTicker
     * @throws ClientException
     */
    public function fundingTicker(string $symbol, bool $mapping = true)
    {
        $response = $this->ticker(
            $this->prefixSymbol($symbol, false)
        );

        if ($mapping && $response) {
            $response = $this->deserializeItem(
                FundingTicker::convertToNamed($symbol, $response),
                FundingTicker::class
            );
        }

        return $response;
    }

    /**
     * Includes all the pertinent details of the trade, such as price, size and time.
     * @param string $symbol
     * @param int $limit Number of records
     * @param int $start Millisecond start time
     * @param int $end Millisecond end time
     * @param int $sort if = 1 it sorts results returned with old > new
     * @return array
     * @throws ClientException
     */
    public function trades(string $symbol, int $limit = 120, int $start = 0, int $end = 0, int $sort = -1): array
    {
        $options = [
            'query' => [
                'limit' => $limit,
                'start' => $start,
                'end' => $end,
                'sort' => $sort,
            ],
        ];
        $response = $this->sendRequest(
            Api::GET,
            $this->getApiUrn(['trades', $symbol, 'hist']),
            $options
        );

        return $response;
    }

    /**
     * @param string $symbol
     * @param int $limit Number of records
     * @param int $start Millisecond start time
     * @param int $end Millisecond end time
     * @param int $sort if = 1 it sorts results returned with old > new
     * @return FundingTrade[]
     * @throws ClientException
     */
    public function fundingTrades(string $symbol, int $limit = 120, int $start = 0, int $end = 0, int $sort = -1): array
    {
        $response = $this->trades(
            $this->prefixSymbol($symbol, false),
            $limit,
            $start,
            $end,
            $sort
        );

        if ($response) {
            $response = $this->deserializeItems(
                FundingTrade::convertToNamed($response),
                FundingTrade::class
            );
        }

        return $response;
    }

    /**
     * @param string $symbol
     * @param int $limit Number of records
     * @param int $start Millisecond start time
     * @param int $end Millisecond end time
     * @param int $sort if = 1 it sorts results returned with old > new
     * @return TradingTrade[]
     * @throws ClientException
     */
    public function tradingTrades(string $symbol, int $limit = 120, int $start = 0, int $end = 0, int $sort = -1): array
    {
        $response = $this->trades(
            $this->prefixSymbol($symbol),
            $limit,
            $start,
            $end,
            $sort
        );

        if ($response) {
            $response = $this->deserializeItems(
                TradingTrade::convertToNamed($response),
                TradingTrade::class
            );
        }

        return $response;
    }

    /**
     * @param string $method Http::GET|POST
     * @param string $uri
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     * @return array response
     * @throws ClientException
     */
    protected function sendRequest(string $method, string $uri, array $options = []): array
    {
        $request = $this->client->createRequest($method, $uri);

        return $this->processResponse(
            $this->client->send($request, $options)
        );
    }
}
