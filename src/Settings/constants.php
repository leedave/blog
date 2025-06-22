<?php
// Add or include this to your constants
if (!defined('constantsLoadedBlog')) {
    define('constantsLoadedBlog', true);
    include __DIR__ . '/tables.php';

    define('blog_entryImg_admin_width', 640);
    define('blog_entryImg_admin_height', 480);
    define('blog_entryImgPrev_admin_width', 160);
    define('blog_entryImgPrev_admin_height', 120);
    define('blog_entryImgPrev_web_width', 160);
    define('blog_entryImgPrev_web_height', 120);
    define('blog_entryImg_web_width', 1024);
    define('blog_entryImg_web_height', 768);
    define('blog_defaultImg', __DIR__ . "/../../templates/web/default_blog_img.jpg");
}
