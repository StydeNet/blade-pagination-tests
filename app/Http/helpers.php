<?php

class Themes
{

    protected static $themes = [
        'bootstrap' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        'foundation' => 'https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
        'materialize' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css',
        'uikit' => 'https://cdnjs.cloudflare.com/ajax/libs/uikit/2.21.0/css/uikit.css'
    ];

    public static function getSupported()
    {
        return array_keys(static::$themes);
    }

    public static function getCdn($theme)
    {
        if (isset(static::$themes[$theme])) {
            return static::$themes[$theme];
        }

        throw new Exception("The theme [{$theme}] was not found");
    }
}