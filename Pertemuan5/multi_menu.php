<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ],
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ],
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilMenuBerttingkat(array $menu)
{
    echo "<ul>";
    foreach ($menu as $key => $item) {
        echo "<li>{$item['nama']}";

        if (isset($item['subMenu'])) {
            tampilMenuBerttingkat($item['subMenu']);
        }
        echo "</li>";
    }
    echo "</ul>";
}
tampilMenuBerttingkat($menu);
?>