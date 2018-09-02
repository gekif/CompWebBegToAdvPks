<?php

$countries = [
    'Indonesia',
    'Malaysia',
    'Thailand',
    'Germany'
];
$c = 1;
echo '<br>';
foreach ($countries as $country) {
    /*    echo $c . '. ' . $country . '<br>';
        $c++;*/
    if (isset($_REQUEST['var1'])) {
        if ($_REQUEST['var1'] == $country) {
            echo '<div style="color: green;">' . $_REQUEST['var1'] . ' is in the list</div>';
        }
    }
}

