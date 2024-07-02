<?php

namespace Ampeco\OmnipayKushki\Message;

use Omnipay\Common\Message\MessageInterface;

class CreateTemporaryTokenNotification implements MessageInterface
{
    public function __construct(protected array $data)
    {
        info('DATA::::', [$this->data]);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getToken(): ?string
    {
        return $this->data['kushkiToken'] ?? null;
    }

    public function getTransactionId(): ?string
    {
        return $this->data['transaction_id'] ?? null;
    }

    public function isSuccessful(): bool
    {
        return $this->getToken() && $this->getTransactionId();
    }
}
