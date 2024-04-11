<?php
/**
 * Copyright © 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace PixieMedia\Security\Plugin\Frontend\Magento\Theme\Block\Html;

use PixieMedia\Security\Helper\Blocker;

class Footer
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

    public function afterGetMiscellaneousHtml(
        \Magento\Theme\Block\Html\Footer $subject,
        $result
    ) {
        if ($this->blockerHelper->useReplaceFooter()) {
            return $this->blockerHelper->getAbsoluteFooter();
        }
        return $result;
    }
}
