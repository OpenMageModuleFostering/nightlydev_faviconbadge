<?php
class NightlyDev_FaviconBadge_Block_Adminhtml_System_Config_Source_Date extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $date = new Varien_Data_Form_Element_Date;
        $format = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);

        $data = array(
            'name'      => $element->getName(),
            'html_id'   => $element->getId(),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
        );
        $date->setData($data);
        $date->setValue($element->getValue(), $format);
        $date->setFormat(Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT));
        #$date->setClass($element->getFieldConfig()->validate->asArray());
        $date->setForm($element->getForm());
        
        $store_id = 0;
        if (strlen($code = Mage::getSingleton('adminhtml/config_data')->getStore()))
          $store_id = Mage::getModel('core/store')->load($code)->getId();
        elseif (strlen($code = Mage::getSingleton('adminhtml/config_data')->getWebsite())) {
          $website_id = Mage::getModel('core/website')->load($code)->getId();
          $store_id = Mage::app()->getWebsite($website_id)->getDefaultStore()->getId();
        }
        $folderName = Mage_Adminhtml_Model_System_Config_Backend_Image_Favicon::UPLOAD_DIR;
        $storeConfig = Mage::getStoreConfig('design/head/shortcut_icon', $store_id);
        $faviconFile = Mage::getBaseUrl('media') . $folderName . '/' . $storeConfig;
        $absolutePath = Mage::getBaseDir('media') . '/' . $folderName . '/' . $storeConfig;
        if(!is_null($storeConfig) && $this->_isFile($absolutePath)) $favicon = $faviconFile;
        else $favicon = Mage::getDesign()->getSkinUrl('favicon.ico');
        return $date->getElementHtml()
          .'<div id="badgeMirror" style="padding:5px;"></ br></ br> </ br>'
          .'<button style="" onclick="javascript:toggle_nightlydevfaviconbadget_preview();" class="scalable" type="button" id="refrsh_favicon_badge_preview"><span><span><span>Refresh Example</span></span></span></button>'
          .'</ br><center><img id="badgePreview" width="32" src="'.$favicon.'" height="32"></center></div>'
          .'<script type="text/javascript" src="/js/nightlydev/jscolor/jscolor.js"></script>'
          .'<script type="text/javascript" src="/js/nightlydev/faviconbadge/favico.js"></script>'
          .'<script type="text/javascript">'
          .'function toggle_nightlydevfaviconbadget_show_order() {$("row_design_nightlydevfaviconbadge_order")[($("design_nightlydevfaviconbadge_type").value=='.NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_ORDERS.' && $("design_nightlydevfaviconbadge_enabled").value=="1")?"show":"hide"]();}Event.observe($("design_nightlydevfaviconbadge_enabled"), "change", function(){toggle_nightlydevfaviconbadget_show_order();});'
          .'function toggle_nightlydevfaviconbadget_show_downs() {$("row_design_nightlydevfaviconbadge_downs")[($("design_nightlydevfaviconbadge_type").value=='.NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DOWNS.' && $("design_nightlydevfaviconbadge_enabled").value=="1")?"show":"hide"]();}Event.observe($("design_nightlydevfaviconbadge_enabled"), "change", function(){toggle_nightlydevfaviconbadget_show_downs();});'
          .'function toggle_nightlydevfaviconbadget_show_date() {$("row_design_nightlydevfaviconbadge_date")[($("design_nightlydevfaviconbadge_type").value=='.NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_DATE.' && $("design_nightlydevfaviconbadge_enabled").value=="1")?"show":"hide"]();}Event.observe($("design_nightlydevfaviconbadge_enabled"), "change", function(){toggle_nightlydevfaviconbadget_show_date();});'
          .'function toggle_nightlydevfaviconbadget_show_num() {$("row_design_nightlydevfaviconbadge_num")[($("design_nightlydevfaviconbadge_type").value=='.NightlyDev_FaviconBadge_Helper_Data::TYPE_CART_NUM.' && $("design_nightlydevfaviconbadge_enabled").value=="1")?"show":"hide"]();}Event.observe($("design_nightlydevfaviconbadge_enabled"), "change", function(){toggle_nightlydevfaviconbadget_show_num();});'
          .'function toggle_nightlydevfaviconbadget_show_badgeMirror() {$("badgeMirror")[($("design_nightlydevfaviconbadge_enabled").value=="1")?"show":"hide"]();}Event.observe($("design_nightlydevfaviconbadge_enabled"), "change", function(){toggle_nightlydevfaviconbadget_show_badgeMirror();});'
          .'window.faviconMirror = false; function toggle_nightlydevfaviconbadget_preview() {if (window.faviconMirror) window.faviconMirror.badge(0); window.faviconMirror = new nightlydevFavico({bgColor:$("design_nightlydevfaviconbadge_bc").value,textColor:$("design_nightlydevfaviconbadge_tc").value,type:$("design_nightlydevfaviconbadge_shape").value,position:$("design_nightlydevfaviconbadge_pos").value,animation : $("design_nightlydevfaviconbadge_anim").value,elementId : "badgePreview"});window.faviconMirror.badge(Math.floor(Math.random() * 12) + 1);};'
          .'Event.observe(window, "load", function(){'
          .'toggle_nightlydevfaviconbadget_show_order();'
          .'toggle_nightlydevfaviconbadget_show_downs();'
          .'toggle_nightlydevfaviconbadget_show_date();'
          .'toggle_nightlydevfaviconbadget_show_num();'
          .'toggle_nightlydevfaviconbadget_show_badgeMirror();'
          .'document.getElementById("design_nightlydevfaviconbadge").appendChild(document.getElementById("badgeMirror"));'
          .'toggle_nightlydevfaviconbadget_preview();'
          .'});'
          .'Event.observe($("design_nightlydevfaviconbadge_tc"), "change", function(){toggle_nightlydevfaviconbadget_preview();});'
          .'Event.observe($("design_nightlydevfaviconbadge_bc"), "change", function(){toggle_nightlydevfaviconbadget_preview();});'
          .'Event.observe($("design_nightlydevfaviconbadge_pos"), "change", function(){toggle_nightlydevfaviconbadget_preview();});'
          .'Event.observe($("design_nightlydevfaviconbadge_anim"), "change", function(){toggle_nightlydevfaviconbadget_preview();});'
          .'Event.observe($("design_nightlydevfaviconbadge_shape"), "change", function(){toggle_nightlydevfaviconbadget_preview();});'
          .'</script>';
    }

    /**
     * If DB file storage is on - find there, otherwise - just file_exists
     *
     * @param string $filename
     * @return bool
     */
    
    protected function _isFile($filename) {
        if (Mage::helper('core/file_storage_database')->checkDbUsage() && !is_file($filename)) {
            Mage::helper('core/file_storage_database')->saveFileToFilesystem($filename);
        }
        return is_file($filename);
    }
}