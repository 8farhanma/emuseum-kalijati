<?php

/*
 * Museum profile content, seeded once into profiles (id = 1).
 * Sources: detikJabar (guide interview) and indonesia.travel.
 * NOTE: the mission is a draft derived from the published vision and the
 * museum's educational role; confirm it with the museum management.
 */

return [
    'history' => implode("\n\n", [
        'Rumah Sejarah Kalijati berada di kompleks Pangkalan Udara TNI AU Suryadarma, Kalijati, Subang, Jawa Barat. Bangunan ini didirikan pada tahun 1917 sebagai rumah dinas bagi perwira staf Sekolah Penerbang Hindia Belanda yang bertugas di lapangan terbang Kalijati.',
        'Pada 8 Maret 1942, rumah ini menjadi tempat perundingan antara pimpinan tertinggi Hindia Belanda dan Jepang. Perundingan semula direncanakan di daerah Jalancagak, tetapi keadaan saat itu tidak memungkinkan sehingga dipindahkan ke Kalijati. Dalam perundingan tersebut, Jenderal Imamura dari pihak Jepang meminta Letnan Jenderal Ter Poorten, panglima tentara Belanda, menyerah tanpa syarat. Peristiwa yang dikenal sebagai Perundingan Kalijati ini menandai berakhirnya kekuasaan Hindia Belanda di Indonesia, yang kemudian digantikan oleh pendudukan Jepang.',
        'Untuk mengenang peristiwa tersebut, bangunan ini dilestarikan sebagai cagar budaya. Atas prakarsa Komandan Lanud Kalijati saat itu, Letkol Pnb Ali BZE, bangunan ini diresmikan sebagai museum dengan nama Museum Rumah Sejarah pada 21 Juli 1986.',
    ]),

    'vision' => 'Melestarikan bangunan bersejarah dan situs cagar budaya di lingkungan Pangkalan Udara Suryadarma Kalijati.',

    'mission' => implode("\n", [
        'Merawat keaslian bangunan Rumah Sejarah sebagai saksi Perundingan Kalijati.',
        'Menyampaikan informasi yang akurat tentang peristiwa Perundingan Kalijati kepada masyarakat.',
        'Menjadi sumber pembelajaran sejarah yang kontekstual bagi pelajar dan pengunjung.',
        'Mengembangkan museum sebagai pusat edukasi sejarah.',
    ]),
];
