<?php

namespace Ampeco\OmnipayKushki\Message;

use Omnipay\Common\Message\MessageInterface;

class CreateTemporaryTokenNotification implements MessageInterface
{
    private const KUSHKI_PAYMENT_METHOD = 'card';

    public function __construct(protected array $data)
    {
        info('DATA::::', [$this->data]);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function isSuccessful(): bool
    {
        return $this->getToken() && $this->getTransaction()
            && $this->getKushkiSubscriptionPlan()
            && $this->getKushkiPaymentMethod() == self::KUSHKI_PAYMENT_METHOD;
    }

    public function getToken(): ?string
    {
        return $this->data['kushkiToken'] ?? null;
    }

    public function getTransaction(): ?string
    {
        return $this->data['transaction'] ?? null;
    }

    private function getKushkiPaymentMethod(): ?string
    {
        return $this->data['kushkiPaymentMethod'] ?? null;
    }

    private function getKushkiSubscriptionPlan(): ?string
    {
        return $this->data['kushkiSubscriptionPlan'] ?? null;
    }
}
