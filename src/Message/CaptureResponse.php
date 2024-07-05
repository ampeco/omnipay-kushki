<?php

namespace Ampeco\OmnipayKushki\Message;

class CaptureResponse extends Response
{
    protected const TRANSACTION_STATUS = 'APPROVAL';
    protected const TRANSACTION_TYPE = 'CAPTURE';
}
