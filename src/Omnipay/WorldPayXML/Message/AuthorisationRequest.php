<?php

namespace Omnipay\WorldPayXML\Message;

class AuthorisationRequest extends ModifyRequest {

	public function setAuthorisation($value)
	{
		return $this->setParameter('authorisation', $value);
	}

	public function getAuthorisation()
	{
		return $this->getParameter('authorisation');
	}

	public function getData()
	{
		$data = $this->getBase();
		$authorise = $data->modify->orderModification->addChild('authorise');
		$authorise->addAttribute('authorisationCode', $this->getAuthorisation());

		return $data;
	}

	/**
	 * Return a value to indicate the transaction type.
	 * @return integer
	 */
	public function getTransactionType()
	{
		return static::AUTHORISATION_CODE_REQUEST;
	}
}
