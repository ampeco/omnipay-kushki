<?php

namespace Ampeco\OmnipayKushki\Message;

class GetBankListRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/transfer/v1/bankList';
    }

    public function getRequestMethod(): string
    {
        return 'GET';
    }

    protected function createResponse(array $data, int $statusCode): GetBankListResponse
    {
        return new GetBankListResponse($this, $data, $statusCode);
    }
}
