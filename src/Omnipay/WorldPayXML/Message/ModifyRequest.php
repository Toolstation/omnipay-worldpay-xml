<?php


namespace Omnipay\WorldPayXML\Message;

abstract class ModifyRequest extends AbstractRequest {

	public function setDebitCreditIndicator($value) {
		return $this->setParameter('debitCreditIndicator', $value);
	}

	public function getDebitCreditIndicator() {
		return $this->getParameter('debitCreditIndicator');
	}

	protected function getBase() {
		$data = parent::getBase();
		$modify = $data->addChild('modify');
		$orderModification = $modify->addChild('orderModification');
		$orderModification->addAttribute('orderCode', $this->getTransactionId());

		return $data;
	}
}