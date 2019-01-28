<?php
namespace Turntable\View\Helper;

use Cake\View\Helper\FormHelper;
use Cake\View\View;

class FoundationFormHelper extends FormHelper
{
    /**
     * FoundationFormHelper constructor.
     * @param View $View The View object
     * @param array $config Configuration of the Helper
     */
    public function __construct(View $View, array $config = [])
    {
        $this->_defaultConfig['templates']['label'] = '<div class="medium-2 cell"><label{{attrs}}>{{text}}</label></div>';
        $this->_defaultConfig['templates']['nestingLabel'] = '{{hidden}}<div class="medium-2 cell"><label{{attrs}}>{{input}}{{text}}</label></div>';
        $this->_defaultConfig['templates']['input'] = '<div class="medium-10 cell"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>';
        $this->_defaultConfig['templates']['inputContainer'] = '<div class="grid-x grid-padding-x">{{content}}</div>';
        $this->_defaultConfig['templates']['inputContainerError'] = '<div class="grid-x grid-padding-x error">{{content}}{{error}}</div>';
        $this->_defaultConfig['templates']['select'] = '<div class="medium-10 cell"><select name="{{name}}"{{attrs}}>{{content}}</select></div>';
        $this->_defaultConfig['templates']['selectMultiple'] = '<div class="medium-10 cell"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>';
        $this->_defaultConfig['templates']['textarea'] = '<div class="medium-10 cell"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>';
        $this->_defaultWidgets['hidden'] = ['Turntable.Hidden'];

        parent::__construct($View, $config);
    }

    /**
     * Render a named widget.
     *
     * This is a lower level method. For built-in widgets, you should be using
     * methods like `text`, `hidden`, and `radio`. If you are using additional
     * widgets you should use this method render the widget without the label
     * or wrapping div.
     *
     * @param string $name The name of the widget. e.g. 'text'.
     * @param array $data The data to render.
     * @return string
     * @throws \ReflectionException
     */
    public function widget($name, array $data = [])
    {
        if ($name === 'hidden') {
            $this->_defaultConfig['templates']['input'] = '<input type="{{type}}" name="{{name}}"{{attrs}}/>';
        }
        $secure = null;
        if (isset($data['secure'])) {
            $secure = $data['secure'];
            unset($data['secure']);
        }
        $widget = $this->_locator->get($name);
        $out = $widget->render($data, $this->context());
        if (isset($data['name']) && $secure !== null && $secure !== self::SECURE_SKIP) {
            foreach ($widget->secureFields($data) as $field) {
                $this->_secure($secure, $this->_secureFieldName($field));
            }
        }

        return $out;
    }
}
