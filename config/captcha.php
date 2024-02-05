<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'default' => [
        'length' => 7,
        'width' => 240,
        'height' => 70,
        'quality' => 0,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
    ],
    'math' => [
        'length' => 280,
        'width' => 90,
        'height' => 100,
        'quality' => 70,
        'math' => true,
    ],

    'flat' => [
        'length' => 5,
        'width' => 280,
        'height' => 90,
        'quality' => 10,
        'lines' => 140,
        'bgImage' => true,
        'bgColor' => '#ecf2f4',
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast' => -80,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 300,
        'height' => 90,
        'quality' => 20,
        'sensitive' => true,
        'angle' =>  0, //70,
        'lines' => 20,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => -15,
    ]
];
