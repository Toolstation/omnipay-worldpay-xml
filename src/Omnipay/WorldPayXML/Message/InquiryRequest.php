<?php

namespace Omnipay\WorldPayXML\Message;

class InquiryRequest  extends AbstractRequest {
	public function getData()
	{
		$data = $this->getBase();
		$inquiry = $data->addChild('inquiry');
		$orderInquiry = $inquiry->addChild('orderInquiry');
		$orderInquiry->addAttribute('orderCode', $this->getTransactionId());

		return $data;
	}

	/**
	 * Return a value to indicate the transaction type.
	 * @return integer
	 */
	public function getTransactionType()
	{
		return static::INQUIRY_REQUEST;
	}
}