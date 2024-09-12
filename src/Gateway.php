<?php

namespace Ampeco\OmnipayKushki;

use Ampeco\OmnipayKushki\Message\AuthorizeRequest;
use Ampeco\OmnipayKushki\Message\BankTransferInitRequest;
use Ampeco\OmnipayKushki\Message\BankTransferTokenRequest;
use Ampeco\OmnipayKushki\Message\CaptureRequest;
use Ampeco\OmnipayKushki\Message\CreateCardRequest;
use Ampeco\OmnipayKushki\Message\CreateTemporaryTokenNotification;
use Ampeco\OmnipayKushki\Message\DeleteCardRequest;
use Ampeco\OmnipayKushki\Message\GetBankListRequest;
use Ampeco\OmnipayKushki\Message\PurchaseRequest;
use Ampeco\OmnipayKushki\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface updateCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    public function getName(): string
    {
        return 'Kushki';
    }

    public function acceptNotification(array $options = array()): CreateTemporaryTokenNotification
    {
        return new CreateTemporaryTokenNotification($options);
    }

    public function createCard(array $options = array()): RequestInterface
    {
        return $this->createRequest(CreateCardRequest::class, $options);
    }

    public function purchase(array $options = array()): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    public function authorize(array $options = array()): RequestInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    public function capture(array $options = array()): RequestInterface
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    public function void(array $options = array()): RequestInterface
    {
        return $this->createRequest(VoidRequest::class, $options);
    }

    public function deleteCard(array $options = array()): RequestInterface
    {
        return $this->createRequest(DeleteCardRequest::class, $options);
    }

    public function getBankList(array $options = array()): RequestInterface
    {
        return $this->createRequest(GetBankListRequest::class, $options);
    }

    public function requestBankTransferToken(array $options = array()): RequestInterface
    {
        return $this->createRequest(BankTransferTokenRequest::class, $options);
    }

    public function initBankTransfer(array $options = array()): RequestInterface
    {
        return $this->createRequest(BankTransferInitRequest::class, $options);
    }

    public function getCreateCardAmount(): float
    {
        return 0;
    }

    public function getAvailableCurrencies(): array
    {
        return ['USD', 'COP', 'CLP', 'UF', 'PEN', 'MXN', 'CRC', 'GTQ', 'HNL', 'NIO', 'BRL', 'CLF'];
    }
}
