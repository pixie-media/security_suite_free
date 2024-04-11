<?php
/**
 * Copyright © 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace PixieMedia\Security\Plugin\Frontend\Magento\Framework\App\Config;

use PixieMedia\Security\Helper\Blocker;

class ScopeConfigInterface
{
    const CONFIG_PATH_DESIGN_HEAD_INCLUDES = 'design/head/includes';
    const CONFIG_PATH_DESIGN_FOOTER_ABSOLUTE_FOOTER = 'design/footer/absolute_footer';
    const CONFIG_PATH_SHIPPING_POLICY_CONTENT = 'shipping/shipping_policy/shipping_policy_content';

    /**
     * @var Blocker
     */
    protected $blockerHelper;

    /**
     * ConfigValuePlugin constructor.
     * @param Blocker $blockerHelper
     */
    public function __construct(
        Blocker $blockerHelper
    ) {
        $this->blockerHelper = $blockerHelper;
    }

    /**
     * Plugin to modify the behavior of a method based on a configuration value.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $subject
     * @param mixed $result
     * @param string $path
     * @return mixed
     */
    public function afterGetValue(
        \Magento\Framework\App\Config\ScopeConfigInterface $subject,
        $result,
        $path
    ) {
        if ($path === self::CONFIG_PATH_DESIGN_HEAD_INCLUDES &&
            $this->blockerHelper->isHeaderIncludesBlocked()) {
            return null;
        }
        if ($path === self::CONFIG_PATH_DESIGN_FOOTER_ABSOLUTE_FOOTER &&
            $this->blockerHelper->isAbsoluteFooterBlocked()) {
            return null;
        }
        if ($path === self::CONFIG_PATH_SHIPPING_POLICY_CONTENT &&
            $this->blockerHelper->isShippingPolicyContentBlocked()) {
            return null;
        }
        return $result;
    }
}
