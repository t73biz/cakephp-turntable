<?php

namespace Turntable;

use Cake\Console\CommandCollection;
use Cake\Core\BasePlugin;
use Turntable\Command\GlazingCommand;

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

    /**
     * Don't try to load routes.
     *
     * @var bool
     */
    protected $routesEnabled = false;

    /**
     * @param CommandCollection $commands Command Collection
     *
     * @return $this|\Cake\Console\CommandCollection
     */
    public function console($commands)
    {
        $commands->add('glaze', GlazingCommand::class);

        return $commands;
    }
}
