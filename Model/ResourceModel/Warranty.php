<?php
namespace Magneto\Warranty\Model\ResourceModel;

class Warranty extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magneto_warranty', 'id');
    }
}