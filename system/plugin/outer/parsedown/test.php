<?php
include ('Parsedown.php');
$textContent = '
| 表头1  | 表头2|
| ------------- | ------------- |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |
';

$Parsedown = new Parsedown();
echo $Parsedown->text($textContent); # prints: <p>Hello <em>Parsedown</em>!</p>
?>
