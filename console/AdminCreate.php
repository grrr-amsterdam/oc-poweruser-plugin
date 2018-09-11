<?php namespace GrrrAmsterdam\PowerUser\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use System\Classes\PluginManager;
use Garp\Functional as f;
use Backend\Database\Seeds\SeedSetupAdmin;

class AdminCreate extends Command
{

    /**
     * @var string The console command name.
     */
    protected $name = 'admin:create';

    /**
     * @var string The console command description.
     */
    protected $description = 'Create an admin user';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->line('Enter a new value, or press ENTER for the default');

        SeedSetupAdmin::$firstName = $this->ask('First Name', SeedSetupAdmin::$firstName);
        SeedSetupAdmin::$lastName = $this->ask('Last Name', SeedSetupAdmin::$lastName);
        SeedSetupAdmin::$email = $this->ask('Email Address', SeedSetupAdmin::$email);
        SeedSetupAdmin::$login = $this->ask('Admin Login', SeedSetupAdmin::$login);
        SeedSetupAdmin::$password = $this->ask('Admin Password', SeedSetupAdmin::$password);

        if (!$this->confirm('Is the information correct?', true)) {
            return $this->handle();
        }

        (new SeedSetupAdmin)->run();
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

