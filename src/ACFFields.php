<?php

namespace HumbleWordPressLoginStyle;

use Extended\ACF\Fields\Image;
use Extended\ACF\Location;

class ACFFields
{
    public static string $title = 'Login style';

    public static function fields(): array
    {
        return [
            Image::make('Logo', 'logo')->previewSize('thumbnail'),
        ];
    }

    public static function location(): array
    {
        return [
            Location::where('options_page', 'login-style'),
        ];
    }
}
