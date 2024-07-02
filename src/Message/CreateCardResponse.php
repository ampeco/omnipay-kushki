<?php

namespace Ampeco\OmnipayKushki\Message;

class CreateCardResponse extends Response
{
    public function isSuccessful() : bool
    {
        return parent::isSuccessful() && isset($this->data['subscriptionId']);
    }

    public function getSubscriptionId(): ?string
    {
        return $this->data['subscriptionId'] ?? null;
    }
}
