<?php

namespace HumbleWordPressLoginStyle;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
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

        app('acf.fields')->registerFieldGroup(ACFFields::class);
    }
}
