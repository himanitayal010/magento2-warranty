<?php
namespace Magneto\Warranty\Model;

class Warranty extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Magneto\Warranty\Model\ResourceModel\Warranty');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}