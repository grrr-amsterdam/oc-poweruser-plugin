<?php namespace GrrrAmsterdam\PowerUser\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Cms\Classes\Theme;

class ThemeRequire extends Command
{

    /**
     * @var string The console command name.
     */
    protected $name = 'theme:require';

    /**
     * @var string The console command description.
     */
    protected $description = 'Install theme dependencies.';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $theme = Theme::getActiveTheme();
        return collect(array_get($theme->getConfig(), 'require', []))
            ->each(function ($requirement) {
                $this->call('plugin:install', ['name' => $requirement]);
            });
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

