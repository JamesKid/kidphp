<?php
$array = array(
    '0'=> array(
        'save_board'=>array(
            '1',
        ),
        'play_pool'=>array(
            '1',
        ),
    )
);

$arraynew = array(
    'save_board'=>array(
        '1',
    ),
    'play_pool'=>array(
        '1',
    ),
);
array_push($array,$arraynew);
print_r($array);
?>
