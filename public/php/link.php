<?php
    function current_page($uri = "/") {
    return request()->path() == $uri;
}
?>