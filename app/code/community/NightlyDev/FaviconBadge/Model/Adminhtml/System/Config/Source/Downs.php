<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Downs
{
    const DOWN_TODO = 'Downloads not downloaded yet';
    const DOWN_LIVE = 'Downloads not expired yet';
    const DOWN_DONE = 'Downloads already done';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::DOWN_TODO, 'label'=>Mage::helper('adminhtml')->__(self::DOWN_TODO)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::DOWN_LIVE, 'label'=>Mage::helper('adminhtml')->__(self::DOWN_LIVE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::DOWN_DONE, 'label'=>Mage::helper('adminhtml')->__(self::DOWN_DONE)),
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
            NightlyDev_FaviconBadge_Helper_Data::DOWN_TODO=>Mage::helper('adminhtml')->__(self::DOWN_TODO),
            NightlyDev_FaviconBadge_Helper_Data::DOWN_LIVE=>Mage::helper('adminhtml')->__(self::DOWN_LIVE),
            NightlyDev_FaviconBadge_Helper_Data::DOWN_DONE=>Mage::helper('adminhtml')->__(self::DOWN_DONE),
        );
    }

}
