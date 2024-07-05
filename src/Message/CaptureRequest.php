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
            ...parent::getData(),
            'ticketNumber' => $this->getTicketNumber(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): CaptureResponse
    {
        return new CaptureResponse($this, $data, $statusCode);
    }
}

