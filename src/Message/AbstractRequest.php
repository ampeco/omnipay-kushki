<?php

namespace Ampeco\OmnipayKushki\Message;

use Ampeco\OmnipayKushki\CommonParameters;
use Ampeco\OmnipayKushki\Gateway;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Omnipay\Common\Message\AbstractRequest as OmniPayAbstractRequest;

abstract class AbstractRequest extends OmniPayAbstractRequest
{
    use CommonParameters;

    protected const API_URL_TEST = 'https://api-uat.kushkipagos.com';
    protected const API_URL_PROD = 'https://api.kushkipagos.com';

    protected ?Gateway $gateway;

    abstract public function getEndpoint(): string;
    abstract protected function createResponse(array $data, int $statusCode): Response;

    public function setGateway(Gateway $gateway): self
    {
        $this->gateway = $gateway;
        return $this;
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    public function getBaseUrl(): string
    {
        return $this->getTestMode() ? self::API_URL_TEST : self::API_URL_PROD;
    }

    public function sendData($data): Response
    {
        info('INNNN SEND DATAT', [
            'data' => $data,
            'method' => $this->getRequestMethod(),
            'url' => $this->getBaseUrl() . $this->getEndpoint(),
            'headers' => $this->getHeaders(),
            'client' => $this->httpClient
        ]); /////

//        $response = $this->httpClient->request(
//            $this->getRequestMethod(),
//            $this->getBaseUrl() . $this->getEndpoint(),
//            $this->getHeaders(),
//            json_encode($data),
//        );
//
//        info('INNNN SEND responseee', ['data' => $response]); /////
//        return $this->createResponse(
//            json_decode($response->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR),
//            $response->getStatusCode(),
//        );

//        working!!!
//        $client = Http::baseUrl($this->getBaseUrl())
//            ->timeout(30)
//            ->asJson()
//            ->withHeaders($this->getHeaders())
//        ;

        $endpoint = $this->getEndpoint();
        if (isset($data['pathParam'])) {
            $endpoint = sprintf($this->getEndpoint(), $data['pathParam']);
            unset($data['pathParam']);
        }

        $response = $this->buildClient()
            ->{strtolower($this->getRequestMethod())}($endpoint, $data);

        info('INNNN SEND responseee', ['data' => $response]); /////

        return $this->createResponse($response->json() ?? [], $response->status());
    }

    private function buildClient(): PendingRequest
    {
        return Http::baseUrl($this->getBaseUrl())
            ->timeout(30)
            ->asJson()
            ->withHeaders($this->getHeaders())
        ;
    }

    private function getHeaders(): array
    {
        return [
            'Private-Merchant-Id' => $this->getPrivateMerchantId(),
        ];
    }
}
