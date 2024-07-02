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
            'amount' => [
                'subtotalIva' => 0,
//                'subtotalIva0' => $this->getAmount(), // TODO uncomment
                'subtotalIva0' => 1000, // TODO remove !!!
                'iva' => 0,
                'ice' => 0,
                'currency' => $this->getCurrency(),
            ],
            'startDate' => Carbon::now()->format('Y-m-d'),
            // + metadata - tran_id? TODO
        ];
    }

    protected function createResponse(array $data, int $statusCode): CreateCardResponse
    {
        return new CreateCardResponse($this, $data, $statusCode);
    }
}
