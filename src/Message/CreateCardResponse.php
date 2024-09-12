<?php

namespace Ampeco\OmnipayKushki\Message;

class CreateCardResponse extends Response
{
    public function isSuccessful() : bool
    {
        return $this->code === 201 && isset($this->data['subscriptionId']);
    }

    public function getSubscriptionId(): ?string
    {
        return $this->data['subscriptionId'] ?? null;
    }

    public function getDetails(): ?array
    {
        return $this->data['details'] ?? null;
    }

    public function getLastFourDigits(): ?string
    {
        if (isset($this->getDetails()['lastFourDigits'])) {
            return '**** ' . $this->getDetails()['lastFourDigits'];
        }
        return null;
    }

    public function getPaymentBrand(): ?string
    {
        return $this->getDetails()['paymentBrand'] ?? null;
    }
}
