<?php
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('test');
$r = mysql_query('SELECT * FROM pictures');
echo mysql_num_rows($r);
while ($arr = mysql_fetch_array($r)) {
    echo $arr[2];
    echo '<br>';
}
?>