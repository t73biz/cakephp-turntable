<?php
namespace Turntable\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Turntable\View\Helper\FoundationFormHelper;

/**
 * Class FoundationFormHelperTest
 */
class FoundationFormHelperTest extends TestCase
{
    /**
     * Test Widget
     */
    public function testConstruct()
    {
        $view = new View();
        $foundationFormHelper = new FoundationFormHelper($view, []);
        $this->assertObjectHasAttribute('_defaultConfig', $foundationFormHelper);
    }
}
