<?php

namespace HumbleWordPressLoginStyle;

use HumbleCore\Support\Facades\Action;
use HumbleCore\Support\Facades\Filter;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register(): void
    {
        app('acf.fields')->registerFieldGroup(ACFFields::class);

        Filter::add('upload_mimes', function ($mimes) {
            $mimes['svg'] = 'image/svg+xml';

            return $mimes;
        });

        Action::add('login_enqueue_scripts', function () {
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
        });

        Filter::add('login_headerurl', function () {
            return get_home_url();
        });
    }

    public function boot(): void
    {
        app('acf.fields')->registerOptionsPage([
            'page_title' => 'Login style',
            'menu_title' => 'Login style',
            'menu_slug' => 'login-style',
            'capability' => 'activate_plugins',
            'redirect' => false,
            'post_id' => 'loginStyle',
            'position' => 200,
            'parent_slug' => 'options-general.php',
        ]);
    }
}
