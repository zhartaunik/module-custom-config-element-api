This module provides interfaces for implementing select objects and inject them into complex configuration fields.

Example:

```
    <!-- Source model with elements, used in system.xml -->
    <virtualType name="AttributeProperties" type="PerfectCode\CustomConfigAttributeApi\Block\Adminhtml\Form\Field\AbstractSelectField">
        <arguments>
            <argument name="optionSource" xsi:type="object">PerfectCode\EavAttributes\Model\System\Config\Source\AttributeProperties</argument>
            <argument name="data" xsi:type="array">
                <item name="is_render_to_js_template" xsi:type="boolean">1</item>
            </argument>
        </arguments>
    </virtualType>
    <type name="PerfectCode\EavAttributes\Block\System\Config\Form\Field\FieldArray\CsvImportHeaders">
        <arguments>
            <argument name="abstractSelectField" xsi:type="object">AttributeProperties</argument>
        </arguments>
    </type>
    <!-- END. Source model with elements, used in system.xml -->
```