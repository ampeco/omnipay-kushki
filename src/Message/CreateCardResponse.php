<?php

namespace Ampeco\OmnipayKushki\Message;

class CreateCardResponse extends Response
{
    public function isSuccessful() : bool
    {
        return $this->code == 201 && isset($this->data['subscriptionId']);
    }

    public function getSubscriptionId(): ?string
    {
        return $this->data['subscriptionId'] ?? null;
    }
}
