<?php

namespace Ampeco\OmnipayKushki;

trait CommonParameters
{
    public function setToken($value): void
    {
        $this->setParameter('token', $value);
    }

    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setEmail($value): void
    {
        $this->setParameter('email', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setPrivateMerchantId($value): void
    {
        $this->setParameter('privateMerchantId', $value);
    }

    public function getPrivateMerchantId(): ?string
    {
        return $this->getParameter('privateMerchantId');
    }

    public function setPublicMerchantId($value): void
    {
        $this->setParameter('publicMerchantId', $value);
    }

    public function getPublicMerchantId(): ?string
    {
        return $this->getParameter('publicMerchantId');
    }

    public function setSubscriptionId($value): void
    {
        $this->setParameter('subscriptionId', $value);
    }

    public function getSubscriptionId(): ?string
    {
        return $this->getParameter('subscriptionId');
    }

    public function setTicketNumber($value): void
    {
        $this->setParameter('ticketNumber', $value);
    }

    public function getTicketNumber(): string
    {
        return $this->getParameter('ticketNumber');
    }

    public function setBankId(string $bankId): void
    {
        $this->setParameter('bankId', $bankId);
    }

    public function getBankId(): string
    {
        return $this->getParameter('bankId');
    }
    
    public function setDocumentNumber(string $documentNumber): void
    {
        $this->setParameter('documentNumber', $documentNumber);
    }

    public function getDocumentNumber(): string
    {
        return $this->getParameter('documentNumber');
    }
}
