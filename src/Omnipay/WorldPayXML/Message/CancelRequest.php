<?php


namespace Omnipay\WorldPayXML\Message;


use Omnipay\Common\Message\RequestInterface;

class CancelRequest extends ModifyRequest implements RequestInterface {
	public function getData()
	{
		$data = $this->getBase();
		$data->modify->orderModification->addChild('cancel');
		return $data;
	}

	/**
	 * Return a value to indicate the transaction type.
	 * @return integer
	 */
	public function getTransactionType()
	{
		return static::CANCEL_REQUEST;
	}
}