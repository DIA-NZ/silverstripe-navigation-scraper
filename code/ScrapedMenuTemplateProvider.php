<?php

class ScrapedMenuTemplateProvider implements TemplateGlobalProvider
{

    public static function get_template_global_variables()
    {
        return array(
            'ScrapedMenu' => 'ScrapedMenu'
        );
    }

    public static function ScrapedMenu($menuSetName)
    {
        return MenuItem::get()->filter(array(
            'MenuSet' => $menuSetName
        ));
    }
}
