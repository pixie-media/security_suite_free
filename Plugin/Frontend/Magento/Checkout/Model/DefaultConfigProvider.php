<?php

/**
 * Copyright © 2024 All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace PixieMedia\Security\Plugin\Frontend\Magento\Checkout\Model;

use Magento\Framework\Escaper;
use PixieMedia\Security\Helper\Blocker;

class DefaultConfigProvider
{
    /**
     * @var Blocker
     */
    protected $blockerHelper;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * ConfigValuePlugin constructor.
     * @param Blocker $blockerHelper
     * @param Escaper $escaper
     */
    public function __construct(
        Blocker $blockerHelper,
        Escaper $escaper
    ) {
        $this->blockerHelper = $blockerHelper;
        $this->escaper = $escaper;
    }

    public function afterGetConfig(
        \Magento\Checkout\Model\DefaultConfigProvider $subject,
        $result
    ) {
        if ($this->blockerHelper->useReplaceShippingPolicy() &&
            isset($result['shippingPolicy']) &&
            isset($result['shippingPolicy']['shippingPolicyContent'])
        ) {
            $policyContent = $this->blockerHelper->getShippingPolicy();
            $result['shippingPolicy']['shippingPolicyContent'] = nl2br($this->escaper->escapeHtml($policyContent));
        }
        return $result;
    }
}
