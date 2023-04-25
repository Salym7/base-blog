<?php

return (function () {
    $intGT0 = '[1-9]+\d*';
    $normUrl = '[0-9aA-zZ_-]+';

    return [
        [
            'test' => '/^$/',
            'controller' => 'articles/all'
        ],
        [
            'test' => '/^article\/add\/?$/',
            'controller' => 'articles/add'
        ],
        [
            'test' => "/^article\/delete\/($intGT0)\/?$/",
            'controller' => 'articles/delete',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^article\/($intGT0)\/?$/",
            'controller' => 'articles/article',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^article\/edit\/($intGT0)\/?$/",
            'controller' => 'articles/edit',
            'params' => ['id' => 1]
        ],
        [
            'test' => '/^cats\/?$/',
            'controller' => 'cats/cats'
        ],
        [
            'test' => "/^cats\/($normUrl)\/?$/",
            'controller' => 'cats/cats',
            'params' => ['cat' => 1]
        ],
        [
            'test' => '/^contacts\/?$/',
            'controller' => 'contacts'
        ],
        [
            'test' => '/^admin\/?$/',
            'controller' => 'admin/admin'
        ],
        [
            'test' => "/^admin\/cats\/delete\/($intGT0)\/?$/",
            'controller' => 'admin/delete',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^admin\/cats\/edit\/($intGT0)\/?$/",
            'controller' => 'admin/edit',
            'params' => ['id' => 1]
        ],
        [
            'test' => "/^auth\/login\/?$/",
            'controller' => 'auth/login'
        ],
        [
            'test' => "/^auth\/reg\/?$/",
            'controller' => 'auth/reg'
        ],
        [
            'test' => "/^auth\/logout\/?$/",
            'controller' => 'auth/logout'
        ]
    ];
})();
