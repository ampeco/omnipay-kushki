<?php

namespace Ampeco\OmnipayKushki\Message;

class AuthorizeResponse extends Response
{
    protected const TRANSACTION_STATUS = 'APPROVAL';
    protected const TRANSACTION_TYPE = 'PREAUTHORIZATION';
}
