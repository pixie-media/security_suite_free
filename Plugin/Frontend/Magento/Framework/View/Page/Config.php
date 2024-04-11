<?php
/**
 * Copyright © 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace PixieMedia\Security\Plugin\Frontend\Magento\Framework\View\Page;

use PixieMedia\Security\Helper\Blocker;

class Config
{
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

    public function afterGetIncludes(
        \Magento\Framework\View\Page\Config $subject,
        $result
    ) {
        if ($this->blockerHelper->useReplaceHeader()) {
            return $this->blockerHelper->getIncludes();
        }
        return $result;
    }
}
