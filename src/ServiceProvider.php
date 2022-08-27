<?php

namespace HumbleWordPressLoginStyle;

use HumbleCore\Support\Facades\Action;
use HumbleCore\Support\Facades\Filter;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function register(): void
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

        app('acf.fields')->registerFieldGroup(ACFFields::class);

        Filter::add('upload_mimes', function ($mimes) {
            return Arr::add($mimes, 'svg', 'image/svg+xml');
        });

        Action::add('login_enqueue_scripts', LoginStyle::class);

        Filter::add('login_headerurl', 'get_home_url');
    }

    public function boot(): void
    {
    }
}
