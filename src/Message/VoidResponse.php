<?php

namespace Ampeco\OmnipayKushki\Message;

class VoidResponse extends Response
{
    protected const TRANSACTION_STATUS = 'INITIALIZED';
    protected const TRANSACTION_TYPE = 'VOID';
}
