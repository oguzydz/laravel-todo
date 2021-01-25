<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Todo Config
    |--------------------------------------------------------------------------
    */

    'paginate_number' => 5,

    'str_limit' => 300,

    'profile_str_limit' => 1,

    'create_message' => 'New Todo created successfully.',

    'status' => [
        '1' => 'finished',
        '5' => 'unfinished',
        'finished' => 'unfinished',
        'unfinished' => 'finished',
    ],

    'status_class' => [
        '0' => '',
        '1' => 'bg-success text-white',
        '5' => '',
    ],

    'status_icon' => [
        'unfinished' => [
            'icon' => 'bx bxs-check-square',
            'text' => 'Done',
            'color' => 'success',
        ],
        'finished' => [
            'icon' => 'bx bxs-x-square',
            'text' => 'Unfinished',
            'color' => 'danger'
        ]
    ],

    'messages' => [
        'notfound' => 'Todo Not Found.',
        '1' => '',
        '5' => '',
    ],

    'post_message' => [
        'update' => 'Succesfully Updated.',
        'create' => 'Succesfully Created.',
        '5' => '',
    ],

    'update_message' => [
        'color' => '#7aff004f'
    ]
];
