<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Anims
{
    const ANIM_NONE    = 'None';
    const ANIM_FADE    = 'Fade';
    const ANIM_POP     = 'Pop';
    const ANIM_POPFADE = 'Pop with Fade';
    const ANIM_SLIDE   = 'Slide';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ANIM_NONE, 'label'=>Mage::helper('adminhtml')->__(self::ANIM_NONE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ANIM_FADE, 'label'=>Mage::helper('adminhtml')->__(self::ANIM_FADE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ANIM_POP, 'label'=>Mage::helper('adminhtml')->__(self::ANIM_POP)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ANIM_POPFADE, 'label'=>Mage::helper('adminhtml')->__(self::ANIM_POPFADE)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ANIM_SLIDE, 'label'=>Mage::helper('adminhtml')->__(self::ANIM_SLIDE)),
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
            NightlyDev_FaviconBadge_Helper_Data::ANIM_NONE=>Mage::helper('adminhtml')->__(self::ANIM_NONE),
            NightlyDev_FaviconBadge_Helper_Data::ANIM_FADE=>Mage::helper('adminhtml')->__(self::ANIM_FADE),
            NightlyDev_FaviconBadge_Helper_Data::ANIM_POP=>Mage::helper('adminhtml')->__(self::ANIM_POP),
            NightlyDev_FaviconBadge_Helper_Data::ANIM_POPFADE=>Mage::helper('adminhtml')->__(self::ANIM_POPFADE),
            NightlyDev_FaviconBadge_Helper_Data::ANIM_SLIDE=>Mage::helper('adminhtml')->__(self::ANIM_SLIDE),
        );
    }

}
