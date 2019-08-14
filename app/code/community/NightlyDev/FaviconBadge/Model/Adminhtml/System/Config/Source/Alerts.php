<?php
class NightlyDev_FaviconBadge_Model_Adminhtml_System_Config_Source_Alerts
{
    const ALERT_PENDING            = 'New Orders';
    const ALERT_PROCESSING         = 'Orders in Processing state';
    const ALERT_PENDING_PROCESSING = 'New Orders and Orders in Processing state';
    const ALERT_REPORTS            = 'Errors in /var/report';
    const ALERT_EXCEPTIONS         = 'Errors in /var/log/';
    const ALERT_REPORT_EXCEPTIONS  = 'Errors in /var/report and /var/log/';
    const ALERT_ORDERS_ERRORS      = 'All not completed Orders and all Errors.';
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_PENDING)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_PROCESSING)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING | NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_PENDING_PROCESSING)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_REPORTS)),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_EXCEPTIONS.Mage::getStoreConfig('dev/log/exception_file'))),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS | NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_REPORT_EXCEPTIONS.Mage::getStoreConfig('dev/log/exception_file'))),
            array('value' => NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING | NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING | NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS | NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS, 'label'=>Mage::helper('adminhtml')->__(self::ALERT_ORDERS_ERRORS)),
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
            NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING=>Mage::helper('adminhtml')->__(self::ALERT_PENDING),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING=>Mage::helper('adminhtml')->__(self::ALERT_PROCESSING),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING | NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING=>Mage::helper('adminhtml')->__(self::ALERT_PENDING_PROCESSING),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS=>Mage::helper('adminhtml')->__(self::ALERT_REPORTS),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS=>Mage::helper('adminhtml')->__(self::ALERT_EXCEPTIONS.Mage::getStoreConfig('dev/log/exception_file')),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS | NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS=>Mage::helper('adminhtml')->__(self::ALERT_REPORT_EXCEPTIONS.Mage::getStoreConfig('dev/log/exception_file')),
            NightlyDev_FaviconBadge_Helper_Data::ALERT_PENDING | NightlyDev_FaviconBadge_Helper_Data::ALERT_PROCESSING | NightlyDev_FaviconBadge_Helper_Data::ALERT_REPORTS | NightlyDev_FaviconBadge_Helper_Data::ALERT_EXCEPTIONS=>Mage::helper('adminhtml')->__(self::ALERT_ORDERS_ERRORS),
        );
    }

}
