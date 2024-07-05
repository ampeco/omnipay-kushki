<?php

namespace Ampeco\OmnipayKushki\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card/%s';
    }

    protected function createResponse(array $data, int $statusCode): PurchaseResponse
    {
        return new PurchaseResponse($this, $data, $statusCode);
    }
}
