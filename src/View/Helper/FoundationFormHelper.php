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
}
