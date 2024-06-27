<?php


return [

    'gpt' => [
        'args' => [
            'feeling' => 'string' ,
            'message' => 'string'
        ],
        'content' => "pretend as a doctor and you are talking to a patient with feeling of \"%s\" and he tell you \"%s\" what will you respond"
    ],

    'summarize' => [
        'args' => [
            'diseases' => 'array'
        ],
        'content' => "you are a patient and have these symptoms \"%s\" , explain your symptoms in small text 15-20 line"
    ],

    'post_analytics' => [
        'args' => [
            'messages' => 'string'
        ],
        'content' => ''
    ],
];
