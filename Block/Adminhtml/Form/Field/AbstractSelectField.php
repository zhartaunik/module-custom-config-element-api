<?php
declare(strict_types=1);

namespace PerfectCode\CustomConfigElementApi\Block\Adminhtml\Form\Field;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;
use PerfectCode\CustomConfigElementApi\Api\SelectColumnInterface;

/**
 * Class AbstractSelectField
 *
 * @method $this setName(string $name)
 *
 * Base class for implementing custom Stores/Configuration field.
 */
class AbstractSelectField extends Select implements SelectColumnInterface
{
    /**
     * @var OptionSourceInterface
     */
    private OptionSourceInterface $optionSource;

    /**
     * CustomerGroupIds constructor.
     * @param Context $context
     * @param OptionSourceInterface $optionSource
     * @param array $data
     */
    public function __construct(Context $context, OptionSourceInterface $optionSource, array $data = [])
    {
        parent::__construct($context, $data);
        $this->optionSource = $optionSource;
    }

    /**
     * Render block HTML
     *
     * @return string
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->optionSource->toOptionArray());
        }
        return parent::_toHtml();
    }

    /**
     * Sets name for input element
     *
     * @param string|null $value
     * @return $this
     */
    public function setInputId(string $value = null): AbstractBlock
    {
        return $this->setId($value);
    }

    /**
     * Sets name for input element
     *
     * @param string|null $value
     * @return $this
     */
    public function setInputName(string $value = null): AbstractBlock
    {
        return $this->setName($value);
    }
}
