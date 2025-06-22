<?php
// Add or include this to your constants
if (!defined('templates_blog_admin')) {
    define('templates_blog_admin', true);

    $templateDir = realpath(__DIR__ . "/../../templates/admin");

    define('template_blog_admin_overview', $templateDir . "/blog/overview.html");
    define('template_blog_admin_edit', $templateDir . "/blog/editPage.html");
    define('template_blog_admin_row', $templateDir . "/blog/tableRow.html");
    define('template_blog_admin_entry_overview', $templateDir . "/blog/entry/overview.html");
    define('template_blog_admin_entry_edit', $templateDir . "/blog/entry/edit.html");
    define('template_blog_admin_entry_row', $templateDir . "/blog/entry/row.html");
    define('template_blog_admin_entry_row_image', $templateDir . "/blog/entry/row_image.html");

//    define('jsAdminTemplates', [
//        "blog_tag_editor" => $templateDir . "js/blog/tagEditor.html",
//        "blog_tag_item" => $templateDir . "js/blog/tagItem.html",
//    ]);
}