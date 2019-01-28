<?php
namespace Turntable\Test\TestCase\View\Widget;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Turntable\View\Helper\FoundationFormHelper;

/**
 * Class HiddenWidgetTest
 */
class HiddenWidgetTest extends TestCase
{
    public function testRenderShowsCorrectTemplate()
    {
        $view = new View();
        $foundationFormHelper = new FoundationFormHelper($view, []);
        $hiddenWidget = $foundationFormHelper->hidden('test');
        $this->assertEquals('<input type="hidden" name="test" text=""/>', $hiddenWidget);
    }
}
