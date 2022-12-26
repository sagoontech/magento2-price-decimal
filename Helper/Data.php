<?php
/**
 *
 * @package SagoonTech\PriceDecimal
 *
 * @author  Adarsh Khatri
 * @url sagoontech.com
 */

namespace SagoonTech\PriceDecimal\Helper;

use Magento\Store\Model\Store;
use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	const MODULE_ENABLED = 'sagoontech_pricedecimal/general/enable';
	
	/**
     * Return Config Value by XML Config Path
     * @param $store
     *
     * @return mixed
     */
	public function isModuleEnabled($store = null)
	{
		return $this->scopeConfig->getValue(self::MODULE_ENABLED, ScopeInterface::SCOPE_STORE, $store);
	}

	/**
	 * Check if there are any decimal value in the price.
	 * @param $price
	 * 
	 * @return bool
	 */
	public function isNoPrecision($price):bool
	{
		if ($this->isModuleEnabled() && $price > 0) {
            $priceNumber = floor($price);
            $fraction = $price - $priceNumber;
            if ($fraction > 0 && $fraction < 1) {
                //do nothing, we use default
            } else {
                return true;
            }
        }
		return false;
	}
}
