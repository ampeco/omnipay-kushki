<?php

namespace Ampeco\OmnipayKushki\Message;

class AuthorizeRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card/%s/authorize';
    }

    protected function createResponse(array $data, int $statusCode): AuthorizeResponse
    {
        return new AuthorizeResponse($this, $data, $statusCode);
    }
}
