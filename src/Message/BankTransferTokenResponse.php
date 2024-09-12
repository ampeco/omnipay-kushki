<?php

namespace Ampeco\OmnipayKushki\Message;

class BankTransferTokenResponse extends Response
{
    public function isSuccessful(): bool
    {
        return $this->code === 201;
    }

    public function getTransactionReference(): string
    {
        return $this->data['token'];
    }

    public function getCode(): ?string
    {
        return $this->data['code'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->data['message'] ?? null;
    }
}
