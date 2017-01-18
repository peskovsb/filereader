<?php
$file = file_get_contents('./people.txt', true);

 print_r(nl2br($file)); ?>