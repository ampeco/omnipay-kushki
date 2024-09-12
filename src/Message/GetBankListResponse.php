<?php

namespace Ampeco\OmnipayKushki\Message;

class GetBankListResponse extends Response
{
    public function isSuccessful() : bool
    {
        return $this->code === 200;
    }
}
