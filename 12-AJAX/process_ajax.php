<?php

echo 'This is PHP page';
echo '<br>';
echo '<br>';
print 'The Second Line';
echo '<br>';
echo '<br>';

$c = 1;
$names = ['Mark', 'John', 'Shaun', 'Lara'];

foreach ($names as $name) {
    echo $c . ' ' . $name . '<br><br>';
    $c++;
}
