<?php

namespace Ampeco\OmnipayKushki\Message;

class DeleteCardRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card/%s';
    }

    public function getRequestMethod(): string
    {
        return 'DELETE';
    }

    public function getData(): array
    {
        return [
            'pathParam' => $this->getSubscriptionId(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): DeleteCardResponse
    {
        return new DeleteCardResponse($this, $data, $statusCode);
    }
}
