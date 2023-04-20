<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title and meta tags (SEO)
    |--------------------------------------------------------------------------
    |
    | You may use the SEO facade to set your page's title, description, and keywords.
    | @see https://splade.dev/docs/title-meta
    |
    */

    'defaults' => [
        'title'       => env('APP_NAME', 'Polban News'),
        'description' => 'Aplikasi Polban News merupakan aplikasi yang dapat digunakan sebagai acuan untuk membantu warga Politeknik Negeri Bandung dalam mendapatkan berita aktual dan faktual mengenai seputar kampus dengan cepat dan tepat terutama bagi seluruh mahasiswa yang terdaftar sebagai mahasiswa aktif di kampus Politeknik Negeri Bandung. !',
        'keywords'    => ['Polban', 'Polban News', 'polban', 'polban news', 'polbannews', 'Portal Berita', 'portal berita', 'berita kampus polban'],
    ],

    'title_prefix'    => '',
    'title_separator' => '',
    'title_suffix'    => '',

    'auto_canonical_link' => true,

    'open_graph' => [
        'auto_fill' => false,
        'image'     => null,
        'site_name' => null,
        'title'     => null,
        'type'      => null, // 'WebPage'
        'url'       => null,
    ],

    'twitter' => [
        'auto_fill'   => false,
        'card'        => null, // 'summary_large_image',
        'description' => null,
        'image'       => null,
        'site'        => null, // '@username',
        'title'       => null,
    ],

];
