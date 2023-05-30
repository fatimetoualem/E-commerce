<?php

// const BASE_URL = '/my_project_mvc/public';

function asset(string $path)
{
    return BASE_URL . '/' . $path;
}

function constructUrl(string $path, array $params = [])
{
    $url = BASE_URL . '/index.php' . $path;

    if ($params) {
        $url .= '?' . http_build_query($params);
    }

    return $url;
}

function isConnected(): bool{
    return array_key_exists('user', $_SESSION) && $_SESSION['user'];
}

// function isConnected(): bool{
//     return array_key_exists('user', $_SESSION) && $_SESSION['user'];
// }