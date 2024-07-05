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

    public function isSuccessful() : bool
    {
        return $this->code == 201
            && isset($this->data['ticketNumber'])
            && isset($this->data['details']['transactionStatus'])
            && $this->data['details']['transactionStatus'] == static::TRANSACTION_STATUS
            && isset($this->data['details']['transactionType'])
            && $this->data['details']['transactionType'] == static::TRANSACTION_TYPE;
    }

    public function getTransactionReference(): ?string
    {
        return $this->data['ticketNumber'] ?? null;
    }
}
