<?php


namespace Omnipay\WorldPayXML\Message;

use DOMDocument;
use Omnipay\Common\Message\RequestInterface;

class ModifyResponse extends Response {

	/**
	 * Constructor
	 *
	 * @param RequestInterface $request Request
	 * @param string           $data    Data
	 *
	 * @access public
	 */
	public function __construct(RequestInterface $request, $data)
	{
		$this->request = $request;

		if (empty($data)) {
			throw new InvalidResponseException();
		}

		$responseDom = new DOMDocument;
		$responseDom->loadXML($data);

		$this->data = simplexml_import_dom(
				$responseDom->documentElement->firstChild
		);
	}

	/**
	 * Get is successful
	 *
	 * @access public
	 * @return boolean
	 */
	public function isSuccessful()
	{
		if (isset($this->data->ok)) {
			return true;
		}

		return false;
	}

	public function getMessage()
	{
		if ($this->isSuccessful()) {
			return 'SUCCESS';
		}

		return (string)$this->data->error;
	}
}