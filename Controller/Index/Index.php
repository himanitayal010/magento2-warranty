<?php
namespace Magneto\Warranty\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $resultFactory;
	protected $checkoutSession;
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		ResultFactory $resultFactory,
		\Magento\Checkout\Model\Session $checkoutSession,
		\Magento\Framework\View\Result\PageFactory $pageFactory
		)
	{
		$this->resultFactory = $resultFactory;
		$this->_checkoutSession = $checkoutSession;
		return parent::__construct($context);
	}

	public function execute()
	{
		$this->_checkoutSession->unsOneYear();
        $this->_checkoutSession->unsTwoYear();
        $this->_checkoutSession->unsThreeYear();
        $this->_checkoutSession->unsInstallFee();

		// echo '<pre>'; print_r($this->getRequest()->getParams()); die();
		$oneyearprice = $this->getRequest()->getParam('oneprice');
		$twoyearprice = $this->getRequest()->getParam('twoprice');
		$threeyearprice = $this->getRequest()->getParam('threeprice');

		$installfeeprice = $this->getRequest()->getParam('installprice');

		$this->_checkoutSession->setOneYear($oneyearprice);
		$this->_checkoutSession->setTwoYear($twoyearprice);
		$this->_checkoutSession->setThreeYear($threeyearprice);

		$this->_checkoutSession->setInstallFee($installfeeprice);

		$resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
	    return $resultJson;
	}
}