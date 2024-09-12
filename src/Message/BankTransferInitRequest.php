<?php

namespace Ampeco\OmnipayKushki\Message;

class BankTransferInitRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/transfer/v1/init';
    }

    public function getData(): array
    {
        return [
            'token' => $this->getTransactionReference(),
            ...$this->getAmountData(),
            'webhooks' => [
                [
                    'events' => [
                        'approvedTransaction',
                        'declinedTransaction',
                    ],
                    'headers' => [
                        [
                            'label' => 'json',
                            'value' => '12',
                        ],
                    ],
                    'urls' => [
                        $this->getNotifyUrl(),
                    ],
                ],
            ],
        ];
    }

    protected function createResponse(array $data, int $statusCode): BankTransferInitResponse
    {
        return new BankTransferInitResponse($this, $data, $statusCode);
    }
}
