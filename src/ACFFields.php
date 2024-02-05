<?php

namespace HumbleWordPressLoginStyle;

use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Fields\File;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\TrueFalse;
use Extended\ACF\Location;

class ACFFields
{
    public static string $title = 'Login style';

    public static function fields(): array
    {
        return [
            File::make('Logo', 'logo')->format('url'),
            Number::make('Logo width', 'logoWidth')->max(320),
            Number::make('Logo height', 'logoHeight'),
            ColorPicker::make('Background color', 'backgroundColor'),
            ColorPicker::make('Link color', 'linkColor'),
            TrueFalse::make('Transparent login box', 'transparentLoginBox'),
            ColorPicker::make('Login box text color', 'loginBoxTextColor'),
        ];
    }

    public static function location(): array
    {
        return [
            Location::where('options_page', 'login-style'),
        ];
    }
}