<?php
/**
 * BuildRX
 *
 * NOTICE OF LICENSE
 * 
 * This code is part of BuildRX's internal libraries.
 * Unless licensed otherwise you may only use this extension in Magento stores worked on by BuildRX.
 *
 * @category    BRX
 * @package     BRX_Stockfilter
 * @copyright   Copyright (c) 2013 BuildRX (http://www.buildrx.com)
 */

/**
 * Stockfilter observer
 *
 * @category    BRX
 * @package     BRX_Stockfilter
 * @author      Matt Dunbar <matt@buildrx.com>
 */
class BRX_Stockfilter_Model_Observer {
    /**
     * Before loading a collection filter out of stock items if necessary (based on the instockonly URL param).
     *
     * @param Varien_Event_Observer $observer
     * @return void
     */
    public function catalogProductCollectionLoadBefore(Varien_Event_Observer $observer) {
        if (Mage::app()->getFrontController()->getRequest()->getParam('instockonly', 0)) {
            $collection = $observer->getCollection();
            Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($collection);
        }
    }
}
?>