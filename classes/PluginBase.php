<?php
namespace GrrrAmsterdam\PowerUser\Classes;

use Illuminate\Database\Eloquent\Factory as ModelFactory;

class PluginBase extends \System\Classes\PluginBase {

    protected $modelFactoriesPath;

    public function makeFactories(\Illuminate\Foundation\Application $app) {
        if ($path = $this->getModelFactoriesPath()) {
            $app->make(ModelFactory::class)->load($path);
        }
    }

    protected function getModelFactoriesPath() {
        return $this->modelFactoriesPath ?: $this->getPluginPath() . '/models/factories';
    }

    protected function getPluginPath() {
        $reflection = new \ReflectionClass(get_class($this));
        return dirname($reflection->getFileName());
    }

}