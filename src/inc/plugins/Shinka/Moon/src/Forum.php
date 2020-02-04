<?php

function moon_index()
{
    Shinka_Moon_Service_MoonService::handle();
}

$plugins->add_hook("index_start", "moon_index");