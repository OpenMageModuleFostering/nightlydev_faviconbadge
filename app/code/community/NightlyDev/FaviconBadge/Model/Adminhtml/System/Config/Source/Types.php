<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Types
{
    const TYPE_CART_ITEMS  = 'Items in Cart.';
    const TYPE_CART_QTYS   = 'Quantity of Items in Cart.';
    const TYPE_CART_ERRORS = 'Validation failures in forms.';
    const TYPE_CART_ORDERS = 'Customer\'s Orders with Status.. (below)';
    const TYPE_CART_DOWNS  = 'Customer\'s Downloads with Status.. (below)';
    const TYPE_CART_DATE   = 'Days left until Date.. (below)';
    const TYPE_CART_NUM    = 'Fixed Number.. (below)';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ITEMS, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_ITEMS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_QTYS, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_QTYS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ERRORS, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_ERRORS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ORDERS, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_ORDERS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DOWNS, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_DOWNS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DATE, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_DATE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_NUM, 'label'=>Mage::helper('adminhtml')->__(self::TYPE_CART_NUM)),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ITEMS=>Mage::helper('adminhtml')->__(self::TYPE_CART_ITEMS),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_QTYS=>Mage::helper('adminhtml')->__(self::TYPE_CART_QTYS),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ERRORS=>Mage::helper('adminhtml')->__(self::TYPE_CART_ERRORS),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ORDERS=>Mage::helper('adminhtml')->__(self::TYPE_CART_ORDERS),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DOWNS=>Mage::helper('adminhtml')->__(self::TYPE_CART_DOWNS),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DATE=>Mage::helper('adminhtml')->__(self::TYPE_CART_DATE),
            NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_NUM=>Mage::helper('adminhtml')->__(self::TYPE_CART_NUM),
        );
    }

}
