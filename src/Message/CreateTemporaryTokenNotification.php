<?php

namespace Ampeco\OmnipayKushki\Message;

use Omnipay\Common\Message\NotificationInterface;

class CreateTemporaryTokenNotification implements NotificationInterface
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

    public function getMessage(): array
    {
        return $this->data;
    }

    public function getToken(): ?string
    {
        return $this->data['kushkiToken'] ?? null;
    }

    public function getTransactionReference(): ?string
    {
        return $this->data['kushkiToken'] ?? null;
    }

    public function getTransactionStatus(): string
    {
        return $this->isSuccessful() ? self::STATUS_COMPLETED : self::STATUS_FAILED;
    }

    private function isSuccessful(): bool
    {
        return $this->getToken() && $this->getTransactionReference()
            && $this->getKushkiSubscriptionPlan()
            && $this->getKushkiPaymentMethod() == self::KUSHKI_PAYMENT_METHOD;
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
