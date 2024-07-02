<?php

namespace Ampeco\OmnipayKushki;

use Ampeco\OmnipayKushki\Message\CreateCardRequest;
use Ampeco\OmnipayKushki\Message\CreateTemporaryTokenNotification;
use Ampeco\OmnipayKushki\Message\DeleteCardRequest;
use Ampeco\OmnipayKushki\Message\PurchaseRequest;
use Ampeco\OmnipayKushki\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
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
        return 1000;
    }

    public function getCreateCardCurrency(): string
    {
//        return 'COP'; // TODO UNCOMMENT
        return 'EUR';
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface purchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
