<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Shapes
{
    const SHAPE_CIRCLE    = 'Circle';
    const SHAPE_RECTANGLE = 'Rectangle';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::SHAPE_CIRCLE, 'label'=>Mage::helper('adminhtml')->__(self::SHAPE_CIRCLE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::SHAPE_RECTANGLE, 'label'=>Mage::helper('adminhtml')->__(self::SHAPE_RECTANGLE)),
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
            NightlyDev_FaviconBadge_Helper_Data::SHAPE_CIRCLE=>Mage::helper('adminhtml')->__(self::SHAPE_CIRCLE),
            NightlyDev_FaviconBadge_Helper_Data::SHAPE_RECTANGLE=>Mage::helper('adminhtml')->__(self::SHAPE_RECTANGLE),
        );
    }

}
