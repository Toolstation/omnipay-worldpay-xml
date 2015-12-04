<?php

namespace Omnipay\WorldPayXML\Message;

class BackOfficeCodeRequest extends ModifyRequest {

	public function setBackOfficeCode($value)
	{
		return $this->setParameter('backOfficeCode', $value);
	}

	public function getBackOfficeCode()
	{
		return $this->getParameter('backOfficeCode');
	}

	public function getData()
	{
		$data = $this->getBase();
		$addBackOfficeCode = $data->modify->orderModification->addChild('addBackOfficeCode');
		$addBackOfficeCode->addAttribute('backOfficeCode', $this->getBackOfficeCode());

		return $data;
	}

	/**
	 * Return a value to indicate the transaction type.
	 * @return integer
	 */
	public function getTransactionType()
	{
		return static::BACK_OFFICE_CODE_REQUEST;
	}
}
