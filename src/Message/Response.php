<?php

namespace Ampeco\OmnipayKushki\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse
{
    public function __construct(RequestInterface $request, array $data, protected int $code)
    {
        parent::__construct($request, $data);
    }

    public function isSuccessful(): bool
    {
        return $this->code == 201;
    }

    public function getTransactionReference(): ?string
    {
        return $this->data['ticketNumber'] ?? null;
    }
}
