<?php

/*
 * SAMPLE publications for non-production environments only.
 * `slug` is the natural key used for idempotency.
 */

return [
    [
        'slug' => 'mengenal-perundingan-kalijati',
        'title' => 'Mengenal Perundingan Kalijati',
        'author' => 'Redaksi',
        'category' => 'Sejarah',
        'content' => implode("\n\n", [
            'Pada 8 Maret 1942, Rumah Sejarah Kalijati menjadi tempat perundingan antara pimpinan tertinggi Hindia Belanda dan Jepang.',
            'Perundingan semula direncanakan di daerah Jalancagak, tetapi dipindahkan ke Kalijati karena keadaan saat itu tidak memungkinkan.',
        ]),
        'image_path' => null,
        'published_at' => '2026-01-15',
    ],
    [
        'slug' => 'sejarah-bangunan-rumah-sejarah-kalijati',
        'title' => 'Sejarah Bangunan Rumah Sejarah Kalijati',
        'author' => 'Redaksi',
        'category' => 'Sejarah',
        'content' => implode("\n\n", [
            'Bangunan ini didirikan pada tahun 1917 sebagai rumah dinas perwira staf Sekolah Penerbang Hindia Belanda.',
            'Pada 21 Juli 1986, bangunan ini diresmikan sebagai Museum Rumah Sejarah.',
        ]),
        'image_path' => null,
        'published_at' => '2026-02-20',
    ],
];
