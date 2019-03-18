<?php
namespace Magneto\Warranty\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
 
class CustomPrice implements ObserverInterface
{

    protected $checkoutSession;

    public function __construct(
        \Magento\Framework\App\Action\Context $context, 
        \Magento\Checkout\Model\Session $checkoutSession) {
        $this->_checkoutSession = $checkoutSession;
    }


    public function execute(\Magento\Framework\Event\Observer $observer) 
    {
        $item = $observer->getEvent()->getData('quote_item');   
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        $price = $item->getProduct()->getPrice();

        if($this->_checkoutSession->getOneYear() || $this->_checkoutSession->getTwoYear() ||  $this->_checkoutSession->getThreeYear() || $this->_checkoutSession->getInstallFee())
        {
            $price = $this->_checkoutSession->getOneYear() + $price;
            $price = $this->_checkoutSession->getTwoYear() + $price;
            $price = $this->_checkoutSession->getThreeYear() + $price;
            $price = $this->_checkoutSession->getInstallFee() + $price;
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
        }
            
        $item->getProduct()->setIsSuperMode(true);
    }
 }