<?php
function renderView($view, $data = [])
{
    extract($data);
    ob_start();
    include "views/{$view}.php";
    $content = ob_get_clean();
    include 'views/layout.php';
}
