<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Pos
{
    const POS_UP     = 'Top Right corner';
    const POS_DOWN   = 'Bottom Right corner';
    const POS_LEFT   = 'Bottom Left corner';
    const POS_UPLEFT = 'Top Left corner';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::POS_UP, 'label'=>Mage::helper('adminhtml')->__(self::POS_UP)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::POS_DOWN, 'label'=>Mage::helper('adminhtml')->__(self::POS_DOWN)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::POS_UPLEFT, 'label'=>Mage::helper('adminhtml')->__(self::POS_UPLEFT)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::POS_LEFT, 'label'=>Mage::helper('adminhtml')->__(self::POS_LEFT)),
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
            NightlyDev_FaviconBadge_Helper_Data::POS_UP=>Mage::helper('adminhtml')->__(self::POS_UP),
            NightlyDev_FaviconBadge_Helper_Data::POS_DOWN=>Mage::helper('adminhtml')->__(self::POS_DOWN),
            NightlyDev_FaviconBadge_Helper_Data::POS_UPLEFT=>Mage::helper('adminhtml')->__(self::POS_UPLEFT),
            NightlyDev_FaviconBadge_Helper_Data::POS_LEFT=>Mage::helper('adminhtml')->__(self::POS_LEFT),
        );
    }

}
