<?php

namespace PixieMedia\Security\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper class for managing security configurations.
 */
class Blocker extends AbstractHelper
{
    const XML_PATH_BLOCK_HEAD_INCLUDES = 'inserts/blocker/block_head_includes';
    const XML_PATH_BLOCK_ABSOLUTE_FOOTER = 'inserts/blocker/block_absolute_footer';
    const XML_PATH_BLOCK_SHIPPING_POLICY_CONTENT = 'inserts/blocker/block_shipping_policy_content';
    const XML_PATH_REPLACE_HEADER = 'inserts/head/replace_header';
    const XML_PATH_INCLUDES = 'inserts/head/includes';
    const XML_PATH_REPLACE_FOOTER = 'inserts/footer/replace_footer';
    const XML_PATH_ABSOLUTE_FOOTER = 'inserts/footer/includes';
    const XML_PATH_REPLACE_SHIPPING_POLICY = 'inserts/shipping_policy/replace_shipping_policy';
    const XML_PATH_SHIPPING_POLICY_CONTENT = 'inserts/shipping_policy/shipping_policy_content';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Blocker constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
        $this->scopeConfig = $context->getScopeConfig();
    }

    /**
     * Check if header includes are blocked.
     * @return bool
     */
    public function isHeaderIncludesBlocked()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_BLOCK_HEAD_INCLUDES,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if absolute footer is blocked.
     * @return bool
     */
    public function isAbsoluteFooterBlocked()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_BLOCK_ABSOLUTE_FOOTER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if shipping policy content is blocked.
     * @return bool
     */
    public function isShippingPolicyContentBlocked()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_BLOCK_SHIPPING_POLICY_CONTENT,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if to replace header.
     * @return bool
     */
    public function useReplaceHeader()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_REPLACE_HEADER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get includes from configuration.
     * @return string|null
     */
    public function getIncludes()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_INCLUDES,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if to replace footer.
     * @return bool
     */
    public function useReplaceFooter()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_REPLACE_FOOTER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get absolute footer from configuration.
     * @return string|null
     */
    public function getAbsoluteFooter()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ABSOLUTE_FOOTER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if to replace shipping policy.
     * @return bool
     */
    public function useReplaceShippingPolicy()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_REPLACE_SHIPPING_POLICY,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get shipping policy content from configuration.
     * @return string|null
     */
    public function getShippingPolicy()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SHIPPING_POLICY_CONTENT,
            ScopeInterface::SCOPE_STORE
        );
    }
}
