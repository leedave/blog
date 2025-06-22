<?php
// Add or include this to your constants
if (!defined('templates_blog_web')) {
    define('templates_blog_web', true);

    $templateDir = realpath(__DIR__ . "/../../templates/web");

    define('jsWebTemplates', [
        "blog_entry" => leedch_web_templateFolder . "js/blog/entry.html",
        "blog_modal" => leedch_web_templateFolder . "js/blog/modal.html",
    ]);
}