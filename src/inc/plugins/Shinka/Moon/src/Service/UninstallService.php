<?php

class Shinka_Moon_Service_UninstallService
{
    public static $setting_group = "moongroup";
    public static $prefix = "moon";
    
    public static function handle()
    {
        require_once MYBB_ROOT . "inc/adminfunctions_templates.php";

        Shinka_Core_Manager_TemplateGroupManager::destroy(self::$prefix);

        find_replace_templatesets(
            "index",
            "#" . preg_quote('{$moon_widget}') . "#i",
            ""
        );

        rebuild_settings();
    }
}
