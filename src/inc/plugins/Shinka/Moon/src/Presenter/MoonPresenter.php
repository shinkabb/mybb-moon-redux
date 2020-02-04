<?php

class Shinka_Moon_Presenter_MoonPresenter
{
    /**
     * @param Shinka_Moon_Entity_Moon $moon
     * @return mixed
     */
    public static function present($moon)
    {
        global $lang, $templates;

        if (!$lang->moon) {
            $lang->load('moon');
        }

        return eval($templates->render('moon_widget'));
    }
}
