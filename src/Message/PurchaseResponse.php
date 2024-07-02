<?php

namespace Ampeco\OmnipayKushki\Message;

class PurchaseResponse extends Response
{
    private const TRANSACTION_STATUS = 'APPROVAL';
    private const TRANSACTION_TYPE = 'SALE';

    public function isSuccessful() : bool
    {
        return parent::isSuccessful()
            && isset($this->data['ticketNumber'])
            && isset($this->data['details']['transactionStatus']) && $this->data['details']['transactionStatus'] == self::TRANSACTION_STATUS
            && isset($this->data['details']['transactionType']) && $this->data['details']['transactionType'] == self::TRANSACTION_TYPE;
    }

    public function getDetails(): ?array
    {
        return $this->data['details'] ?? null;
    }

    public function getLastFourDigits(): ?string
    {
        if (isset($this->getDetails()['binInfo']['lastFourDigits'])) { /// TODO
            return '**** ' . $this->getDetails()['binInfo']['lastFourDigits'];
        }
        return null;
    }

    public function getPaymentBrand(): ?string
    {
        return $this->getDetails()['paymentBrand'] ?? null;
    }
}
