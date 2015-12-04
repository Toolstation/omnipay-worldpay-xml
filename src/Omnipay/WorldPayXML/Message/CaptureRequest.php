<?php


namespace Omnipay\WorldPayXML\Message;


class CaptureRequest extends ModifyRequest {

	public function setCaptureDayOfMonth($value) {
		return $this->setParameter('captureDayOfMonth', $value);
	}

	public function getCaptureDayOfMonth() {
		return $this->getParameter('captureDayOfMonth');
	}

	public function setCaptureMonth($value) {
		return $this->setParameter('captureMonth', $value);
	}

	public function getCaptureMonth() {
		return $this->getParameter('captureMonth');
	}

	public function setCaptureYear($value) {
		return $this->setParameter('captureYear', $value);
	}

	public function getCaptureYear() {
		return $this->getParameter('captureYear');
	}

	public function getData()
	{
		$data = $this->getBase();
		$capture = $data->modify->orderModification->addChild('capture');
		$date = $capture->addChild('date');
		$date->addAttribute('dayOfMonth', $this->getCaptureDayOfMonth());
		$date->addAttribute('month', $this->getCaptureMonth());
		$date->addAttribute('year', $this->getCaptureYear());
		$amount = $capture->addChild('amount');
		$amount->addAttribute('value', $this->getAmountInteger());
		$amount->addAttribute('currencyCode', $this->getCurrency());
		$amount->addAttribute('exponent', $this->getCurrencyDecimalPlaces());
		$amount->addAttribute('debitCreditIndicator', $this->getDebitCreditIndicator());

		return $data;
	}

	/**
	 * Return a value to indicate the transaction type.
	 * @return integer
	 */
	public function getTransactionType()
	{
		return static::CAPTURE_REQUEST;
	}
}