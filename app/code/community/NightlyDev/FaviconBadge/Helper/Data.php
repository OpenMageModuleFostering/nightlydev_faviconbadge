<?php
class NightlyDev_FaviconBadge_Helper_Data extends Mage_Core_Helper_Abstract
{
  const XML_PATH_FAVBADGE_ENABLED = 'design/nightlydevfaviconbadge/enabled';
  const XML_PATH_FAVBADGE_BC      = 'design/nightlydevfaviconbadge/bc';
  const XML_PATH_FAVBADGE_TC      = 'design/nightlydevfaviconbadge/tc';
  const XML_PATH_FAVBADGE_POS     = 'design/nightlydevfaviconbadge/pos';
  const XML_PATH_FAVBADGE_ANIM    = 'design/nightlydevfaviconbadge/anim';
  const XML_PATH_FAVBADGE_SHAPE    = 'design/nightlydevfaviconbadge/shape';
  const XML_PATH_FAVBADGE_TYPE    = 'design/nightlydevfaviconbadge/type';
  const XML_PATH_FAVBADGE_ORDER   = 'design/nightlydevfaviconbadge/order';
  const XML_PATH_FAVBADGE_DOWN    = 'design/nightlydevfaviconbadge/downs';
  const XML_PATH_FAVBADGE_DATE    = 'design/nightlydevfaviconbadge/date';
  const XML_PATH_FAVBADGE_NUM     = 'design/nightlydevfaviconbadge/num';
  
  const XML_PATH_FAVBADGE_ADMIN_ENABLED = 'design/nightlydevfaviconbadge_admin/enabled';
  const XML_PATH_FAVBADGE_ADMIN_ALERT   = 'design/nightlydevfaviconbadge_admin/alert';
  
  const POS_UP      = 'up';
  const POS_DOWN    = 'down';
  const POS_LEFT    = 'left';
  const POS_UPLEFT  = 'upleft';
  
  const SHAPE_CIRCLE     = 'circle';
  const SHAPE_RECTANGLE  = 'rectangle';
  
  const ANIM_NONE     = 'none';
  const ANIM_FADE     = 'fade';
  const ANIM_POP      = 'pop';
  const ANIM_POPFADE  = 'popFade';
  const ANIM_SLIDE    = 'slide';
  
  const TYPE_CART_ITEMS  = 1;
  const TYPE_CART_QTYS   = 2;
  const TYPE_CART_ERRORS = 4;
  const TYPE_CART_ORDERS = 8;
  const TYPE_CART_DOWNS  = 16;
  const TYPE_CART_DATE   = 32;
  const TYPE_CART_NUM    = 64;
  
  const DOWN_TODO = 1;
  const DOWN_LIVE = 2;
  const DOWN_DONE = 4;
  
  const ALERT_PENDING    = 1;
  const ALERT_PROCESSING = 2;
  const ALERT_REPORTS    = 4;
  const ALERT_EXCEPTIONS = 8;
  
  public function getBadge() {
    $badge = 0;
    switch(Mage::getStoreConfig(self::XML_PATH_FAVBADGE_TYPE)) {
      case self::TYPE_CART_ITEMS:
        $badge = Mage::getModel('checkout/cart')->getQuote()->getItemsCount();
        break;
      case self::TYPE_CART_QTYS:
        $badge = Mage::getModel('checkout/cart')->getQuote()->getItemsQty();
        break;
      case self::TYPE_CART_ORDERS:
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
          $badge = Mage::getResourceModel('sales/order_collection')
            ->addFieldToSelect('entity_id')
            ->addFieldToFilter('customer_id', Mage::getSingleton('customer/session')->getCustomer()->getId())
            ->addFieldToFilter('status', Mage::getStoreConfig(self::XML_PATH_FAVBADGE_ORDER))
            ->count();
        }
        break;
      case self::TYPE_CART_DOWNS:
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
          $purchased_ids = array();
          foreach(Mage::getModel('downloadable/link_purchased')->getCollection()->addFieldToSelect('purchased_id')->addFieldToFilter('customer_id', Mage::getSingleton('customer/session')->getCustomer()->getId())->load() as $down)
              $purchased_ids[] = $down->getPurchasedId();
          switch(Mage::getStoreConfig(self::XML_PATH_FAVBADGE_DOWN)){
            case DOWN_TODO:
              $badge = Mage::getModel('downloadable/link_purchased_item')->getCollection()
                ->addFieldToSelect('item_id')
                ->addFieldToFilter('number_of_downloads_used', '0')
                ->addFieldToFilter('status', 'available')
                ->addFieldToFilter('purchased_id', array('in'=>$purchased_ids))
                ->count();
              break;
            case DOWN_LIVE:
              $badge = Mage::getModel('downloadable/link_purchased_item')->getCollection()
                ->addFieldToSelect('item_id')
                ->addFieldToFilter('status', 'available')
                ->addFieldToFilter('purchased_id', array('in'=>$purchased_ids))
                ->count();
              break;
            case DOWN_DONE:
              foreach(
                Mage::getModel('downloadable/link_purchased_item')->getCollection()
                  ->addFieldToSelect('number_of_downloads_used')
                  ->addFieldToFilter('number_of_downloads_used', array('nin'=>'0'))
                  ->addFieldToFilter('status', 'available')
                  ->addFieldToFilter('purchased_id', array('in'=>$purchased_ids))
                  ->load()
                as $down)
                  $badge += $down->getNumberOfDownloadsUsed();
              break;
          }
        }
        break;
      case self::TYPE_CART_DATE:
        $diff = strtotime(Mage::getStoreConfig(self::XML_PATH_FAVBADGE_DATE)) - time();
        $badge = ($diff < 0) ? 0 : ceil($diff/60/60/24);
        break;
      case self::TYPE_CART_NUM:
        $badge = Mage::getStoreConfig(self::XML_PATH_FAVBADGE_NUM);
        break;
    }
    return (int)$badge;
  }
  
  public function getAdminBadges() {
    $errors = 0;
    $orders = 0;
    $config = Mage::getStoreConfig(self::XML_PATH_FAVBADGE_ADMIN_ALERT);
    if ($config & self::ALERT_PENDING)
      $orders += Mage::getResourceModel('sales/order_collection')
        ->addFieldToSelect('entity_id')
        ->addFieldToFilter('state', Mage_Sales_Model_Order::STATE_NEW)
        ->count();
    if ($config & self::ALERT_PROCESSING)
      $orders += Mage::getResourceModel('sales/order_collection')
        ->addFieldToSelect('entity_id')
        ->addFieldToFilter('state', Mage_Sales_Model_Order::STATE_PROCESSING)
        ->count();
    if ($config & self::ALERT_REPORTS)
      $errors += count(
        glob(
          Mage::getBaseDir('var')
            .DIRECTORY_SEPARATOR
            .'report'
            .DIRECTORY_SEPARATOR
            .'*'
        )
      );
    if ($config & self::ALERT_EXCEPTIONS)
      $errors += substr_count(
        file_get_contents(
          Mage::getBaseDir('var')
            .DIRECTORY_SEPARATOR
            .'log'
            .DIRECTORY_SEPARATOR
            .Mage::getStoreConfig('dev/log/exception_file')
        ),
        'Stack trace:'
      );
    return new Varien_Object(array(
      'errors' => $errors,
      'orders' => $orders
    ));
  }
  
  public function getBc() {
    return Mage::getStoreConfig(self::XML_PATH_FAVBADGE_BC);
  }
  
  public function getTc() {
    return Mage::getStoreConfig(self::XML_PATH_FAVBADGE_TC);
  }
  
  public function getPos() {
    return Mage::getStoreConfig(self::XML_PATH_FAVBADGE_POS);
  }
  
  public function getAnim() {
    return Mage::getStoreConfig(self::XML_PATH_FAVBADGE_ANIM);
  }
  
  public function getShape() {
    return Mage::getStoreConfig(self::XML_PATH_FAVBADGE_SHAPE);
  }
}
