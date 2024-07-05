<?php

namespace Ampeco\OmnipayKushki\Message;

class VoidRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/v1/refund/%s';
    }

    public function getRequestMethod(): string
    {
        return 'DELETE';
    }

    public function getData(): array
    {
        return [
            ...parent::getData(),
            'pathParam' => $this->getTicketNumber(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): VoidResponse
    {
        return new VoidResponse($this, $data, $statusCode);
    }
}
