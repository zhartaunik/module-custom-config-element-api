<?php
declare(strict_types=1);

namespace PerfectCode\CustomConfigElementApi\Api;

use Magento\Framework\View\Element\AbstractBlock;

/**
 * @api
 */
interface SelectColumnInterface
{
    /**
     * Sets the id for the input element
     *
     * @param string|null $value
     * @return AbstractBlock
     */
    public function setInputId(string $value = null): AbstractBlock;

    /**
     * Sets the name for the input element
     *
     * @param string|null $value
     * @return AbstractBlock
     */
    public function setInputName(string $value = null): AbstractBlock;
}
