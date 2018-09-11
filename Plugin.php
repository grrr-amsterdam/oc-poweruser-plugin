<?php namespace GrrrAmsterdam\PowerUser;

use Backend;
use System\Classes\PluginBase;

/**
 * PowerUser Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'PowerUser',
            'description' => 'A collection of core utils we use in our OctoberCMS projects',
            'author'      => 'Grrr',
            'icon'        => 'icon-battery-full'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommand(
            'theme.require', 'GrrrAmsterdam\PowerUser\Console\ThemeRequire'
        );
        $this->registerConsoleCommand(
            'plugin.list', 'GrrrAmsterdam\PowerUser\Console\PluginList'
        );
        $this->registerConsoleCommand(
            'admin.create', 'GrrrAmsterdam\PowerUser\Console\AdminCreate'
        );
    }

}
