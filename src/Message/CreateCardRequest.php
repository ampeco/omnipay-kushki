<?php

namespace Ampeco\OmnipayKushki\Message;

use Carbon\Carbon;

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
            ...parent::getAmountData(),
            'startDate' => Carbon::now()->format('Y-m-d'),
        ];
    }

    protected function createResponse(array $data, int $statusCode): CreateCardResponse
    {
        return new CreateCardResponse($this, $data, $statusCode);
    }
}
