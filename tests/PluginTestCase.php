<?php
namespace GrrrAmsterdam\PowerUser\Tests;

use PluginTestCase as PluginTestCaseBase;
use System\Classes\PluginManager;

class PluginTestCase extends PluginTestCaseBase {

    protected $modelFactories = [];

    public function setUp() {
        parent::setUp();

        if (config('database.default') == 'sqlite') {
            app()->make('db')->connection()->getPdo()->exec('pragma foreign_keys=1');
        }

        $pluginManager = PluginManager::instance();
        $pluginManager->registerAll(true);
        $pluginManager->bootAll(true);

        $this->loadModelFactories($pluginManager);
    }

    public function tearDown() {
        parent::tearDown();

        $pluginManager = PluginManager::instance();
        $pluginManager->unregisterAll();
    }

    protected function loadModelFactories(PluginManager $pluginManager) {
        array_map(function($identifier) use ($pluginManager) {
            $pluginManager->findByIdentifier($identifier)
                ->makeFactories($this->app);
        }, $this->modelFactories);
    }
}