<?php
/**
 *
 * @package SagoonTech\PriceDecimal
 *
 * @author  Adarsh Khatri
 * @url sagoontech.com
 */

namespace SagoonTech\PriceDecimal\Plugin\Pricing\Render;

use Magento\Framework\Pricing\PriceCurrencyInterface;

class Amount
{
	/** @var \Magento\Framework\Pricing\PriceCurrencyInterface  */
    protected $priceCurrency;
	
	/** @var \SagoonTech\PriceDecimal\Helper\Data  */
    protected $moduleHelper;

    /**
     * @param \SagoonTech\PriceDecimal\Helper\Data $moduleHelper
	 * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
		\SagoonTech\PriceDecimal\Helper\Data $moduleHelper,
		PriceCurrencyInterface $priceCurrency
    ) {
        $this->moduleHelper  = $moduleHelper;
        $this->priceCurrency  = $priceCurrency;
		
    }
	
	/**
     * Format price value
	 *
	 * around function of Magento\Framework\Pricing\Render\Amount::formatCurrency()
     *
     * @param float $amount
     * @param bool $includeContainer
     * @param int $precision
     * @return float
     */
    public function aroundFormatCurrency(
        \Magento\Framework\Pricing\Render\Amount $subject,
		callable $proceed,
        $price,
		$includeContainer = true,
        $precision = PriceCurrencyInterface::DEFAULT_PRECISION
    ) {
		if ($this->moduleHelper->isNoPrecision($price)){
            $precision = 0;
		}
		
        $renderPrice = $this->priceCurrency->format($price, $includeContainer, $precision);
		return $renderPrice;
    }
}
