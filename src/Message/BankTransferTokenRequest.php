<?php

namespace Ampeco\OmnipayKushki\Message;

class BankTransferTokenRequest extends AbstractRequest
{
    public function getEndpoint(): string
    {
        return '/transfer/v1/tokens';
    }

    public function getData(): array
    {
        return [
            'bankId' => $this->getBankId(),
            ...$this->getAmountData(),
            'callbackUrl' => $this->getReturnUrl(),
            'userType' => '0',
            'documentType' => 'CC',
            'documentNumber' => $this->getDocumentNumber(),
            'paymentDescription' => $this->getDescription(),
            'email' => $this->getEmail(),
            'currency' => $this->getCurrency(),
        ];
    }

    protected function createResponse(array $data, int $statusCode): BankTransferTokenResponse
    {
        return new BankTransferTokenResponse($this, $data, $statusCode);
    }
}
