<?php

class Shinka_Moon_Service_InstallService
{
    public static $template_group = array(
        'prefix' => 'moon',
        'title' => 'Moon',
        'isdefault' => 1,
        'asset_dir' => MYBB_ROOT . "inc/plugins/Shinka/Moon/resources/templates",
    );

    public static function handle()
    {
        require_once MYBB_ROOT . "inc/adminfunctions_templates.php";

        $template_groups = Shinka_Core_Entity_TemplateGroup::fromArray(self::$template_group);
        Shinka_Core_Manager_TemplateGroupManager::create($template_groups);

        find_replace_templatesets(
            "index",
            "#" . preg_quote('{$header}') . "#i",
            "{\$header}{\$moon_widget}"
        );

        rebuild_settings();
    }
}
