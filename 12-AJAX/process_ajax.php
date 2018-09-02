<?php

echo 'This is PHP page';
echo '<br>';
echo '<br>';
print '<strong>The Second Line</strong>';
echo '<br>';
echo '<br>';

$names = ['Mark', 'John', 'Shaun', 'Lara'];
$c = 1;

foreach ($names as $name) {

    if ($_REQUEST['var1'] === $name) {
        echo $c . ' ' . $name . ' is the important name<br><br>';
    } else {
        echo $c . ' ' . $name . '<br><br>';
    }

    $c++;
}
if (isset($_REQUEST['var2'])) {
    if ($_REQUEST['var2'] == '') {
        echo 'We have an empty variable so we unable to show the result';
    } else {
        echo 'We have some ' . $_REQUEST['var2'] .  '. We will need to  eat them';
    }
} else {
    echo 'Note: Something is more there but not visible because variable inside it
    which in note declared';
}
