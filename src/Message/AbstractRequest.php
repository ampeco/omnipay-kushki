<?php

namespace Ampeco\OmnipayKushki\Message;

use Ampeco\OmnipayKushki\CommonParameters;
use Ampeco\OmnipayKushki\Gateway;
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

    public function getData(): array
    {
        return [
            ...$this->getAmountData(),
            'fullResponse' => 'v2',
            'pathParam' => $this->getSubscriptionId(),
        ];
    }

    public function sendData($data): Response
    {
        $endpoint = $this->getEndpoint();
        if (isset($data['pathParam'])) {
            $endpoint = sprintf($this->getEndpoint(), $data['pathParam']);
            unset($data['pathParam']);
        }

        $response = $this->httpClient->request(
            $this->getRequestMethod(),
            $this->getBaseUrl() . $endpoint,
            $this->getHeaders(),
            $this->getRequestMethod() !== 'GET' ? json_encode($data) : '',
        );

        return $this->createResponse(
            ($this->getRequestMethod() === 'DELETE' && $response->getStatusCode() === 204)
                ? [] : json_decode($response->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR),
            $response->getStatusCode(),
        );
    }

    protected function getAmountData(): array
    {
        return [
            'amount' => [
                'subtotalIva' => 0,
                'subtotalIva0' => (float) $this->getAmount(),
                'iva' => 0,
                'ice' => 0,
                'currency' => $this->getCurrency(),
            ],
        ];
    }

    private function getHeaders(): array
    {
        $headers = [];
        
        if ($this->getPrivateMerchantId()) {
            $headers['Private-Merchant-Id'] = $this->getPrivateMerchantId();
        }
        
        if ($this->getPublicMerchantId()) {
            $headers['Public-Merchant-Id'] = $this->getPublicMerchantId();
        }
        
        return $headers;
    }
}
