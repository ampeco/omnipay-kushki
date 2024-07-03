<?php

namespace Ampeco\OmnipayKushki\Message;

class CaptureRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card/%s/capture';
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
            'ticketNumber' => $this->getTicketNumber(),
            'pathParam' => $this->getSubscriptionId(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): CaptureResponse
    {
        return new CaptureResponse($this, $data, $statusCode);
    }
}

