<?php
namespace Grrr\PowerUser\Classes;

use File;
use Cms\Classes\Theme;
use Symfony\Component\Finder\Finder;
use Illuminate\Contracts\FileSystem\FileNotFoundException;
use Garp\Functional as f;

class ThemeConfig {

    protected $_theme;

    protected $_config = [];

    protected $_yaml;


    public function __construct(Theme $theme) {
        $this->_theme = $theme;
        $this->_loadConfig();
    }

    public function get($key) {
        $route = explode('.', $key);
        return f\prop_in($route, $this->_config);
    }

    protected function _loadConfig() {
        $yaml = new \October\Rain\Parse\Yaml;
        $finder = new Finder();
        if (File::exists($this->_theme->getPath() . '/config')) {
            $files = $finder->files()->name('*.yaml')->in($this->_theme->getPath() . '/config');
            foreach ($files as $file) {
                $this->_config[$this->_determineKeyFromFilename($file->getBasename())]
                    =  $yaml->parse($file->getContents());
            }
        }
    }

    protected function _determineKeyFromFilename(string $filename) {
        return substr($filename, 0, -5);
    }
}