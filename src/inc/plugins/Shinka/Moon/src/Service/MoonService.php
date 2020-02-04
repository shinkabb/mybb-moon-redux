<?php

require_once MYBB_ROOT . "inc/functions.php";

class Shinka_Moon_Service_MoonService
{
    public static function handle()
    {
        global $moon_widget;

        self::setup();

        $moon = Shinka_Moon_Manager::get();
        $moon_widget = Shinka_Moon_Presenter_MoonPresenter::present($moon);

        return $moon_widget;
    }
    
    protected static function setup()
    {
        global $lang, $templatelist;

        $templatelist .= "moon_widget";

        if (!$lang->moon) {
            $lang->load('moon');
        }
    }
}