<?php
class BRX_Stockfilter_Model_Observer {
    public function catalogProductCollectionLoadBefore(Varien_Event_Observer $observer) {
        if (Mage::app()->getFrontController()->getRequest()->getParam('instockonly', 0)) {
            $collection = $observer->getCollection();
            Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($collection);
            //Mage::log('Collection Filtered By Stock;: '.sizeof($collection));
            /*
            $oCollection = Mage::getModel('cataloginventory/stock_item')
                ->getCollection()
                ->addFieldToFilter('is_in_stock', 0);
            $oProducts = array();
            foreach ($oCollection as $_collection) {
                $oProducts[] = $_collection->getProductId();
            }
            if (!empty($oProducts))
                $collection->addIdFilter($oProducts, true);

            */

        }
    }
}


?>