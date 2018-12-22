<?php

return [

    // Mail Notification
    'mail_notification' => env('MAIL_NOTIFICATION') ?: false,

    // Super Admin
    'super_admin' => env('APP_SUPER_ADMIN') ?: 1,

    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/images/default.png',

    // Default Icon
    'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',

    // Color Theme
    'color_theme' => 'gray-theme',

    // Meta
    'meta' => [
        'keywords' => 'wuguozhang,lichmaker,blog,laravel',
        'description' => 'No King Rules Forever'
    ],

    // Social Share
    'social_share' => [
        'article_share'    => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: false,
//        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'google,twitter,weibo',
//        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter,weibo,qq,wechat',
        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'weibo',
        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'wechat,weibo',
    ],

    // Google Analytics
    'google' => [
        'id'   => env('GOOGLE_ANALYTICS_ID', 'Google-Analytics-ID'),
        'open' => env('GOOGLE_OPEN') ?: false
    ],

    // Article Page
    'article' => [
        'title'       => 'No King Rules Forever',
        'subTitle'    => '王权没有永恒',
        'description' => 'http://wuguozhang.com',
        'number'      => 15,
        'sort'        => 'desc',
        'sortColumn'  => 'published_at',
    ],

    // Discussion Page
    'discussion' => [
        'number' => 20,
        'sort'   => 'desc',
        'sortColumn' => 'created_at',
    ],

    // Footer
    'footer' => [
        'github' => [
            'open' => true,
            'url'  => 'https://github.com/lichmaker',
        ],
        'twitter' => [
            'open' => true,
            'url'  => 'https://twitter.com/pigjian'
        ],
        'weibo' => [
            'open' => true,
            'url'  => 'https://weibo.com/v5zhang/'
        ],
        'meta' => 'Copyright 2018 by 吴国章. Powered By PJ Blog',
    ],

    'license' => '原创文章,转载请保留或注明出处',

];
