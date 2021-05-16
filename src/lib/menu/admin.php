<?php
return [
    [
        'id'            => 1, // 此id只要保证当前的数组中是唯一的即可
        'title'         => 'WIKI/文档',
        'icon'          => 'feather icon-book',
        'uri'           => 'wiki',
        'parent_id'     => 0,
        'roles'         => 'administrator', // 与角色绑定
    ],
    [
        'id'            => 2, // 此id只要保证当前的数组中是唯一的即可
        'title'         => '写作',
        'icon'          => '',
        'uri'           => 'wiki',
        'parent_id'     => 1,
        'roles'         => 'administrator', // 与角色绑定
    ],
    [
        'id'            => 3, // 此id只要保证当前的数组中是唯一的即可
        'title'         => '分类',
        'icon'          => '',
        'uri'           => 'wiki/class',
        'parent_id'     => 1,
        'roles'         => 'administrator', // 与角色绑定
    ],
];