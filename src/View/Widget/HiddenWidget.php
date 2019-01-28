<?php
namespace Turntable\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\Widget\BasicWidget;

/**
 * Class HiddenWidget
 *
 * This will render hidden inputs and display them properly.
 */
class HiddenWidget extends BasicWidget {
    /**
     * Render a hidden input.
     *
     * This method accepts a number of keys:
     *
     * - `text` The text of the button. Unlike all other form controls, buttons
     *   do not escape their contents by default.
     * - `escape` Set to true to enable escaping on all attributes.
     * - `type` The button type defaults to 'submit'.
     *
     * Any other keys provided in $data will be converted into HTML attributes.
     *
     * @param array $data The data to build a button with.
     * @param \Cake\View\Form\ContextInterface $context The current form context.
     * @return string
     */
    public function render(array $data, ContextInterface $context)
    {
        $data += [
            'text' => '',
            'type' => 'hidden',
            'escape' => false,
            'templateVars' => []
        ];

        // Override the template string
        $this->_templates->remove('input');
        $this->_templates->add(['input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>']);

        $hidden =  $this->_templates->format('input', [
            'name' => $data['name'],
            'type' => $data['type'],
            'templateVars' => $data['templateVars'],
            'attrs' => $this->_templates->formatAttributes(
                $data,
                ['name', 'type']
            ),
        ]);

        // Reset the input template
        $this->_templates->remove('input');
        $this->_templates->add(['input' => '<div class="medium-10 cell"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>']);

        return $hidden;
    }
}