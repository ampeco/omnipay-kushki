<?php

namespace Ampeco\OmnipayKushki;

use Ampeco\OmnipayKushki\Message\AuthorizeRequest;
use Ampeco\OmnipayKushki\Message\CaptureRequest;
use Ampeco\OmnipayKushki\Message\CreateCardRequest;
use Ampeco\OmnipayKushki\Message\CreateTemporaryTokenNotification;
use Ampeco\OmnipayKushki\Message\DeleteCardRequest;
use Ampeco\OmnipayKushki\Message\PurchaseRequest;
use Ampeco\OmnipayKushki\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
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

    public function getCreateCardAmount(): float
    {
        return 0;
    }

    public function getAvailableCurrencies(): array
    {
        return ['USD', 'COP', 'CLP', 'UF', 'PEN', 'MXN', 'CRC', 'GTQ', 'HNL', 'NIO', 'BRL', 'CLF'];
    }
}
