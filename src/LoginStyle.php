<?php

namespace HumbleWordPressLoginStyle;

class LoginStyle
{
    public static function init()
    {
        $logo = get_field('logo', 'loginStyle');
        $backgroundColor = get_field('backgroundColor', 'loginStyle');
        $linkColor = get_field('linkColor', 'loginStyle'); ?>
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
        </style>
        <?php

        if (! empty($backgroundColor)) {
            ?>
            <style type="text/css">
                body {
                    background-color: <?= $backgroundColor ?> !important;
                }
            </style>
            <?php
        }

        if (! empty($linkColor)) {
            ?>
            <style type="text/css">
                .login #nav a, 
                .login #backtoblog a {
                    color: <?= $linkColor ?> !important;
                }
            </style>
            <?php
        }

        if (! empty($logo)) {
            ?>
            <style type="text/css">
                #login h1 a {
                    background-image: url(<?= $logo ?>);
                    width: 150px;
                    height: 100px;
                    background-size: contain;
                    background-position: center;
                }
            </style>
            <?php
        }
    }
}
