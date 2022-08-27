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

        Action::add('login_enqueue_scripts', [LoginStyle::class, 'init']);

        Filter::add('login_headerurl', 'get_home_url');
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
