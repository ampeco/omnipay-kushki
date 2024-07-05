<?php

namespace Ampeco\OmnipayKushki\Message;

class PurchaseResponse extends Response
{
    protected const TRANSACTION_STATUS = 'APPROVAL';
    protected const TRANSACTION_TYPE = 'SALE';

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
