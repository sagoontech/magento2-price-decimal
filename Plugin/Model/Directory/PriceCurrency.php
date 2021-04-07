<?php
/**
 *
 * @package SagoonTech\PriceDecimal
 *
 * @author  Adarsh Khatri
 * @url sagoontech.com
 */

namespace SagoonTech\PriceDecimal\Plugin\Model\Directory;

use Magento\Framework\Pricing\PriceCurrencyInterface;

class PriceCurrency
{
    /** @var \SagoonTech\PriceDecimal\Helper\Data  */
    protected $moduleHelper;

    /**
     * @param \SagoonTech\PriceDecimal\Helper\Data $moduleHelper
     */
    public function __construct(
        \SagoonTech\PriceDecimal\Helper\Data $moduleHelper
    ) {
        $this->moduleHelper  = $moduleHelper;

    }

    /**
     * @inheritdoc
     */
    public function aroundFormat(
        \Magento\Directory\Model\PriceCurrency $subject,
        callable $proceed,
        $amount,
        $includeContainer = true,
        $precision = PriceCurrencyInterface::DEFAULT_PRECISION,
        $scope = null,
        $currency = null
    ) {
        if($this->moduleHelper->isModuleEnabled()) {
            $priceNumber = floor($amount);
            $fraction = $amount - $priceNumber;
            if ($fraction > 0 && $fraction < 1) {
                //do nothing, we use default
            } else {
                $precision = 0;
            }
        }

        return $subject->getCurrency($scope, $currency)
            ->formatPrecision($amount, $precision, [], $includeContainer);
    }
}
