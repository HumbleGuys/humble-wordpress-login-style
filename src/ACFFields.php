<?php

namespace HumbleWordPressLoginStyle;

use Extended\ACF\Fields\File;
use Extended\ACF\Location;

class ACFFields
{
    public static string $title = 'Login style';

    public static function fields(): array
    {
        return [
            File::make('Logo', 'logo')->returnFormat('url'),
        ];
    }

    public static function location(): array
    {
        return [
            Location::where('options_page', 'login-style'),
        ];
    }
}
