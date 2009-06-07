<?php
include($_SERVER['DOCUMENT_ROOT']."/wp-config.php");
mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "SELECT ".$table_prefix.users.".".user_login.",count(*)\n"
    . "FROM ".$table_prefix.posts.",".$table_prefix.users."\n"
    . "WHERE ".$table_prefix.posts.".".post_parent."=0 and ".$table_prefix.posts.".".post_author."=".$table_prefix.users.".".ID."\n"
    . "Group by ".$table_prefix.users.".".user_login."\n"
    . "Order by count(*) DESC\n"
    . "Limit 0,10";   
$result = mysql_query($sql) or die(mysql_error());
echo "\n";
echo "<ul>";
while($row = mysql_fetch_array($result))
{
	echo "<li><strong>";
	echo $row['user_login'];
	echo "</strong>&nbsp";
	echo "(";
	echo $row['count(*)'];
	echo ")</li>";

}
echo "</ul>";

?>