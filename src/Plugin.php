<?php

namespace Turntable;

use Cake\Core\BasePlugin;
use Composer\Script\Event;

/**
 * Plugin for Turntable
 */
class Plugin extends BasePlugin
{
    /**
     * Plugin name.
     *
     * @var string
     */
    protected $name = 'Turntable';

    public function postAutoloadDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        copy($vendorDir . '/zurb/foundation/dist/*', $vendorDir . '/t73biz/Turntable/webroot/');
    }
}
