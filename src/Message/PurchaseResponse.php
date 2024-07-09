<?php

namespace Ampeco\OmnipayKushki\Message;

class PurchaseResponse extends Response
{
    protected const TRANSACTION_STATUS = 'APPROVAL';
    protected const TRANSACTION_TYPE = 'SALE';
}
