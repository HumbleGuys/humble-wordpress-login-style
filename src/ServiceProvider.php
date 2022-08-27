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
            $logoLogin = get_field('logo', 'loginStyle');

            if (! empty($logoLogin)) {
                ?>
                <style type="text/css">
                    #login h1 a {
                        background-image: url(<?= $logoLogin ?>);
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
