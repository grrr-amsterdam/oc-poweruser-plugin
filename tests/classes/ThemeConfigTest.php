<?php
namespace GrrrAmsterdam\PowerUser\Tests\Classes;

use Cms\Classes\Theme;
use GrrrAmsterdam\PowerUser\Classes\ThemeConfig;
use GrrrAmsterdam\PowerUser\Tests\PluginTestCase;

class ThemeConfigTest extends PluginTestCase {

    public function setUp() {
        parent::setUp();
        app()->setThemesPath(__DIR__ . '/../fixtures/themes');

    }
    /** @test */
    public function it_can_load_config_from_a_yaml_file_in_theme() {
        $theme = Theme::load('test');

        $config = new ThemeConfig($theme);

        $this->assertEquals(
            ['foo' => 'bar'],
            $config->get('some_config')
        );
    }

    /** @test */
    public function it_wont_fail_if_config_directory_does_not_exist() {
        $theme = Theme::load('dontexist');
        $config = new ThemeConfig($theme);
        $this->assertNull($config->get('some_config'));
    }

    /** @test */
    public function it_can_get_nested_config_with_dot_syntax() {
        $theme = Theme::load('test');
        $config = new ThemeConfig($theme);
        $this->assertEquals('bar', $config->get('some_config.foo'));
    }
}