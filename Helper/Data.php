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
}
