<?php

/**
 * Manages objects in database
 *
 * @package Shinka\Weather
 */
class Shinka_Moon_Manager extends Shinka_Core_Manager_Manager
{
    static function get() {
        if (!self::checkCache()) {
            return self::getCached();
        }

        $moon = new Shinka_Moon_Entity_Moon();
        $moon = $moon->toArray();
        self::updateCache($moon);

        return $moon;
    }

    protected static function updateCache($response)
    {
        global $cache;

        $moon = $cache->read('moon');
        $moon = !$moon ? array() : $moon;
        $moon['response'] = $response;
        $moon['time'] = time();
        $cache->update('moon', $moon);
    }

    /**
     * @return boolean `true` if cache should be invalidated
     */
    protected static function checkCache()
    {
        global $cache;

        $moon = $cache->read('moon');

        if (!$moon) {
            return true;
        }

        $ONE_HOUR = 3600;
        return (!isset($moon['time']) || $moon['time'] < time() - $ONE_HOUR);
    }

    protected static function getCached()
    {
        global $cache;
        $moon = $cache->read('moon');
        return $moon['response'];
    }
}
