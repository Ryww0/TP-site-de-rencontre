<?php

namespace service;


trait View
{
    function render($title = '', $file, $variables = [])
    {
        $content = $this->renderContent($file, $variables);
        ob_start();
        include APP_ROOT . './view/partials/head.php';
        return ob_get_clean();
    }

    function renderContent($file, $variables = [])
    {
        extract($variables);
        ob_start();
        include APP_ROOT . '/templates/' . $file;
        return ob_get_clean();
    }
}
