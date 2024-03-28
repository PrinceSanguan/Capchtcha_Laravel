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
        'length' => 10,
        'width' => 300,
        'height' => 90,
        'quality' => 100,
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
        'sensitive' => false,
        'angle' =>  0,
        'lines' => 0,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => 40,
    ],
    'inverseIndex' => [
        'length' => 5,
        'width' => 300,
        'height' => 90,
        'quality' => 100,
        'sensitive' => false,
        'angle' =>  0,
        'lines' => 0,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => 20,
    ],
    'inverse2' => [
        'length' => 5,
        'width' => 300,
        'height' => 90,
        'quality' => 20,
        'sensitive' => true,
        'angle' =>  10,
        'lines' => 20,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => -10,
    ],
    'inverse3' => [
        'length' => 5,
        'width' => 300,
        'height' => 90,
        'quality' => 20,
        'sensitive' => true,
        'angle' =>  30,
        'lines' => 50,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => -30,
    ],
    'inverse4' => [
        'length' => 6,
        'width' => 300,
        'height' => 90,
        'quality' => 40,
        'sensitive' => true,
        'angle' =>  30,
        'lines' => 70,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => -50,
    ],
    'inverse5' => [
        'length' => 7,
        'width' => 300,
        'height' => 90,
        'quality' => 20,
        'sensitive' => true,
        'angle' =>  70,
        'lines' => 100,
        'sharpen' => 0,
        'blur' => 0,
        'invert' => true,
        'contrast' => -100,
    ],
    'inverse6' => [
        'length' => 9,
        'width' => 300,
        'height' => 90,
        'quality' => 20,
        'sensitive' => true,
        'angle' =>  100,
        'lines' => 100,
        'sharpen' => 0,
        'blur' => 100,
        'invert' => true,
        'contrast' => -100,
    ]
];
