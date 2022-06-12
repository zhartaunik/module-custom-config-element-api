<?php

declare(strict_types=1);

namespace PerfectCode\CustomConfigElementApi\Block\System\Config\Form\Field\FieldArray;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use PerfectCode\CustomConfigElementApi\Block\Adminhtml\Form\Field\AbstractSelectField;

/**
 * Class StoreConfigForm
 *
 * Custom frontend_model for admin stores/configuration field to manage Headers for imported CSV file with attributes.
 *
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 * @codeCoverageIgnore
 */
class StoreConfigForm extends AbstractFieldArray
{
    /**
     * Enable the "Add after" button or not
     *
     * @var bool
     */
    protected $_addAfter = false;

    /**
     * Button which generates new row.
     *
     * @var string
     */
    private string $buttonLabel;

    /**
     * @var array<string, int, AbstractSelectField>
     */
    private array $elements;

    /**
     * AdjustmentRate constructor.
     * @param Context $context
     * @param string $buttonLabel
     * @param array $elements
     * @param array $data
     */
    public function __construct(Context $context, string $buttonLabel, array $elements, array $data = [])
    {
        parent::__construct($context, $data);
        $this->buttonLabel = $buttonLabel;
        $this->elements = $elements;
    }

    /**
     * List of available columns.
     */
    protected function _prepareToRender(): void
    {
        foreach ($this->elements as $element) {
            $this->addColumn(
                $element['name'],
                [
                    'label' => __($element['label']),
                    'class' => $element['class'],
                    'renderer' => $element['renderer'] ?? false
                ]
            );
        }

        $this->_addButtonLabel = __($this->buttonLabel);
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        foreach ($this->elements as $element) {
            if (isset($element['renderer']) && $element['renderer'] instanceof AbstractSelectField) {
                //declared in _prepareToRender with method addColumn($name, $params)
                $columnValue = $row->getData($element['name']);
                $options = [];
                if ($columnValue) {
                    $options['option_' . $element['renderer']->calcOptionHash($columnValue)] = 'selected="selected"';
                }
                $row->setData('option_extra_attrs', $options);
            }
        }
    }
}
