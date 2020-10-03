<?php 

namespace GreenCheap\ProTheme\Controller;

use Symfony\Component\Yaml\Yaml;

use GreenCheap\Application as App;
/**
 * @Route("/site")
 */
class ThemeController
{

    protected $module;

    public function __construct()
    {
        $this->module = App::module('pro-theme-main');
    }

    /**
     * @Access(admin=true)
     */
    public function themeAction()
    {
        $navbar = Yaml::parseFile($this->module->get('path').'/views/layout/navbar/define.yml');
        $mobile = Yaml::parseFile($this->module->get('path').'/views/layout/mobile/define.yml');
        $offcanvas = Yaml::parseFile($this->module->get('path').'/views/layout/offcanvas/define.yml');
        return [
            '$view' => [
                'title' => __('Theme'),
                'name' => 'theme:views/admin/theme-configure.php'
            ],
            '$data' => [
                'name' => $this->module->get('name'),
                'config' => $this->module->get('config'),
                'options' => [
                    'navbar' => $navbar,
                    'mobile' => $mobile,
                    'offcanvas' => $offcanvas
                ],
            ] 
        ];
    }
}

?>