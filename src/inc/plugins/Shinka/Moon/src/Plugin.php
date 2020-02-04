<?php

/**
 * Responsible for common plugin functions
 *
 * Should not be invoked manually.
 *
 * @package  Shinka\Moon
 */
function moon_info()
{
    global $lang;

    if (!$lang->moon) {
        $lang->load('moon');
    }

    return array(
        'name' => $lang->moon,
        'description' => $lang->moon_description,
        'website' => 'https://github.com/ShinkaBB/Moon',
        'author' => 'Shinka',
        'authorsite' => 'https://github.com/ShinkaBB',
        'codename' => 'moon',
        'version' => '2.0.0',
        'compatibility' => '18*',
    );
}

/**
 * @return void
 */
function moon_install()
{
    Shinka_Moon_Service_InstallService::handle();
}

/**
 * @return boolean
 */
function moon_is_installed()
{
    global $cache;

    $plugins = $cache->read('plugins');
    $activePlugins = $plugins['active'] ?: [];
    return in_array('moon', $activePlugins);
}

/**
 * @return void
 */
function moon_uninstall()
{
    Shinka_Moon_Service_UninstallService::handle();
}

function moon_activate()
{}

function moon_deactivate()
{}

