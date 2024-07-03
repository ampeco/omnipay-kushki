<?php

namespace Ampeco\OmnipayKushki\Message;

class AuthorizeResponse extends Response
{
    private const TRANSACTION_STATUS = 'APPROVAL';
    private const TRANSACTION_TYPE = 'PREAUTHORIZATION';

    public function isSuccessful() : bool
    {
        return parent::isSuccessful()
            && isset($this->data['ticketNumber'])
            && isset($this->data['details']['transactionStatus']) && $this->data['details']['transactionStatus'] == self::TRANSACTION_STATUS
            && isset($this->data['details']['transactionType']) && $this->data['details']['transactionType'] == self::TRANSACTION_TYPE;
    }

//    public function getTransactionReference(): ?string
//    {
//        return $this->data['ticketNumber'] ?? null;
//    }
}
