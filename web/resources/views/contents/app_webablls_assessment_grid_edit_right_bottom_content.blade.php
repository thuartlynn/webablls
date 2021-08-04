<?php
    if ($AssInfo->get('Initial') == 1) {
        $page_id = 2;
    } else {
        $page_id = 3;
    }
    include('/web/resources/views/contents/app_webablls_assessment_tgv.blade.php');
?>