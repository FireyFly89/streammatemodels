<?php

if (!class_exists('ArticleStorage')) {
    require get_template_directory() . '/includes/ArticleStorage.php';
}

// Retrieves a static image from custom asset path
function get_static_image($image_name)
{
    return get_template_directory_uri() . "/assets/images/" . $image_name;
}

// Utility function to dump more readable data
function pre_dump($data)
{
    echo "<pre style='background-color: white !important; color: black !important; position: relative;'>";
    var_dump($data);
    echo "</pre>";
}

function get_intl_previous_month($months)
{
    $previous_month = date("n", strtotime("-1 month"));
    $previous_month -= 1;

    if ($previous_month === 0) {
        $previous_month = 11;
    }

    return $months[$previous_month];
}
