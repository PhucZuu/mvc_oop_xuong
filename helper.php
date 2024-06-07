<?php

const PATH_ROOT = __DIR__ ."/";

if(!function_exists("asset"))
{
    function asset($path)
    {
        return $_ENV['BASE_URL'] . $path;
    }
}

if(!function_exists("url"))
{
    function url($uri = null)
    {
        return $_ENV['BASE_URL'] . $uri;
    }
}

if(!function_exists("is_logged"))
{
    function is_logged()
    {
        return isset($_SESSION["user"]);
    }
}

if(!function_exists("is_admin"))
{
    function is_admin()
    {
        return isset($_SESSION["user"]) && $_SESSION['user']['role'] == 1;
    }
}

if(!function_exists("avoid_login"))
{
    function avoid_login()
    {
        if(is_logged())
        {
            if(is_admin())
            {
                header('Location: ' . url('admin/'));
                exit;
            }

            header('Location: '. url());
        }

    }
}