<?php namespace Grrr\PowerUser;

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
            'description' => 'A collection of console commands allowing greater automation.',
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
        $this->registerConsoleCommand('theme.require', 'Grrr\PowerUser\Console\ThemeRequire');
        $this->registerConsoleCommand('plugin.list', 'Grrr\PowerUser\Console\PluginList');
        $this->registerConsoleCommand('admin.create', 'Grrr\PowerUser\Console\AdminCreate');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Grrr\PowerUser\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'grrr.poweruser.some_permission' => [
                'tab' => 'PowerUser',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'poweruser' => [
                'label'       => 'PowerUser',
                'url'         => Backend::url('grrr/poweruser/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['grrr.poweruser.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSchedule($schedule) {
        $schedule->command('queue:work --once --tries=3 --timeout=120')->withoutOverlapping();
    }
}
