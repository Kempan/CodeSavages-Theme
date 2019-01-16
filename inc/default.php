<?php

//Default function on init


//Check if header image is set otherwise use example
function checkHeaderImage(){
    if (has_header_image()):
        echo header_image();
    else:
        echo get_template_directory_uri() . '/img/example_header.jpg';
    endif;
}




