<?php
namespace Magneto\Warranty\Model\ResourceModel\Warranty;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
	protected $_idFieldName = 'id';

	protected $_eventPrefix = 'warranty_custom_collection';

	protected $_eventObject = 'warranty_collection';

    protected function _construct()
    {
        $this->_init('Magneto\Warranty\Model\Warranty','Magneto\Warranty\Model\ResourceModel\Warranty');
    }
}