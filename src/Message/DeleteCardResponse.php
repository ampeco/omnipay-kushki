<?php

namespace Ampeco\OmnipayKushki\Message;

class DeleteCardResponse extends Response
{
    public function isSuccessful() : bool
    {
        return $this->code == 204;
    }
}
