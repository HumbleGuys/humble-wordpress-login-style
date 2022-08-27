<?php

namespace HumbleWordPressLoginStyle;

use HumbleCore\Support\Facades\ACF;
use Illuminate\Support\Facades\Blade;

class LoginStyle
{
    public static function init()
    {
        $css =
        <<<'blade'
            <style type="text/css">
                body {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                }

                #login {
                    padding: 2rem 0 !important;
                }
                
                #backtoblog,
                .language-switcher {
                    display: none !important;
                }

                @if (!empty($backgroundColor))
                    body {
                        background-color: {{ $backgroundColor }} !important;
                    }
                @endif

                @if (!empty($linkColor))
                    .login #nav a, 
                    .login #backtoblog a {
                        color: {{ $linkColor }} !important;
                    }
                @endif

                @if (!empty($logo))
                    #login h1 a {
                        background-image: url({{ $logo }});
                        width: 150px;
                        height: 100px;
                        background-size: contain;
                        background-position: center;
                    }
                @endif
            </style>
        blade;

        echo Blade::render($css, [
            'logo' => ACF::get('logo', 'loginStyle'),
            'backgroundColor' => ACF::get('backgroundColor', 'loginStyle'),
            'linkColor' => ACF::get('linkColor', 'loginStyle'),
        ]);
    }
}
