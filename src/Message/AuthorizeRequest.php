<?php

namespace Ampeco\OmnipayKushki\Message;

class AuthorizeRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card/%s/authorize';
    }

    public function getData(): array
    {
        return [
            'amount' => [
                'subtotalIva' => 0,
                'subtotalIva0' => floatval($this->getAmount()),
                'iva' => 0,
                'ice' => 0,
                'currency' => $this->getCurrency(),
            ],
            'fullResponse' => 'v2',
            'pathParam' => $this->getSubscriptionId(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): AuthorizeResponse
    {
        return new AuthorizeResponse($this, $data, $statusCode);
    }
}
