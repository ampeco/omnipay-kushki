<?php

namespace Ampeco\OmnipayKushki\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class BankTransferInitResponse extends Response implements RedirectResponseInterface
{
    public function isSuccessful(): bool
    {
        return $this->code === 201 && isset($this->data['redirectUrl']);
    }

    public function isRedirect(): bool
    {
        return true;
    }

    public function getRedirectUrl(): string
    {
        return $this->data['redirectUrl'];
    }

    public function redirect(): void
    {
        // nothing
    }
}
