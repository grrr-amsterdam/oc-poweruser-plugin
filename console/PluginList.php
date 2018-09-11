<?php namespace GrrrAmsterdam\PowerUser\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use System\Classes\PluginManager;
use Garp\Functional as f;

class PluginList extends Command
{

    /**
     * @var string The console command name.
     */
    protected $name = 'plugin:list';

    /**
     * @var string The console command description.
     */
    protected $description = 'List installed plugins';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $pluginManager = PluginManager::instance();
        $plugins = $pluginManager->getPlugins();
        $this->info(implode("\n", array_keys($plugins)));
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}

