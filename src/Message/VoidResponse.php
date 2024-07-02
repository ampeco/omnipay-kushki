<?php

namespace Ampeco\OmnipayKushki\Message;

class VoidResponse extends Response
{
    private const TRANSACTION_STATUS = 'INITIALIZED';
    private const TRANSACTION_TYPE = 'VOID';

    public function isSuccessful() : bool
    {
        return parent::isSuccessful()
            && isset($this->data['ticketNumber'])
            && isset($this->data['details']['transactionStatus']) && $this->data['details']['transactionStatus'] == self::TRANSACTION_STATUS
            && isset($this->data['details']['transactionType']) && $this->data['details']['transactionType'] == self::TRANSACTION_TYPE;
    }
}
