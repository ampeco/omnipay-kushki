<?php

namespace Ampeco\OmnipayKushki\Message;

class CreateCardRequest extends AbstractRequest
{
    private const PLAN_NAME = 'Premium';
    private const CUSTOM_PERIODICITY = 'custom';

    public function getEndpoint(): string
    {
        return '/subscriptions/v1/card';
    }

    public function getData(): array
    {
        return [
            'token' => $this->getToken(),
            'planName' => self::PLAN_NAME,
            'periodicity' => self::CUSTOM_PERIODICITY,
            'contactDetails' => [
                'email' => $this->getEmail(),
            ],
            ...$this->getAmountData(),
            'startDate' => date('Y-m-d'),
            'fullResponse' => 'v2',
        ];
    }

    protected function createResponse(array $data, int $statusCode): CreateCardResponse
    {
        return new CreateCardResponse($this, $data, $statusCode);
    }
}
