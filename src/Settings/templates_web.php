<?php
// Add or include this to your constants
if (!defined('templates_blog_web')) {
    define('templates_blog_web', true);

    $templateDir = realpath(__DIR__ . "/../../templates/web");

//    define('jsWebTemplates', [
//        "blog_entry" => $templateDir . "js/blog/entry.html",
//        "blog_modal" => $templateDir . "js/blog/modal.html",
//    ]);
}