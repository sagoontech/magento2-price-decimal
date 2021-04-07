<?php
/**
 *
 * @package SagoonTech\PriceDecimal
 *
 * @author  Adarsh Khatri
 * @url sagoontech.com
 */

namespace SagoonTech\PriceDecimal\Plugin\Block\Tax\Item\Price;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Quote\Model\Quote\Item\AbstractItem as QuoteItem;
use Magento\Sales\Model\Order\Item as OrderItem;

class Renderer
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
     * Format price
     *
	 * around function Magento\Tax\Block\Item\Price\Renderer::formatPrice
	 *
     * @param float $price
     * @return string
     */
    public function aroundFormatPrice(
		\Magento\Tax\Block\Item\Price\Renderer $subject,
		callable $proceed,
		$price
	){
		$precision = PriceCurrencyInterface::DEFAULT_PRECISION;
		if($this->moduleHelper->isModuleEnabled()){
			$priceNumber = floor($price);
			$fraction = $price - $priceNumber;
			if($fraction > 0 && $fraction < 1){
				//do nothing, we use default
			} else{
				$precision = 0;
			}
		}
		
        $item = $subject->getItem();
        if ($item instanceof QuoteItem) {
            return $this->priceCurrency->format(
                $price,
                true,
                $precision,
                $item->getStore()
            );
        } elseif ($item instanceof OrderItem) {
            return $item->getOrder()->formatPrice($price);
        } else {
            return $item->getOrderItem()->getOrder()->formatPrice($price);
        }
    }
}
