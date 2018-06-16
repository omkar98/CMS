<?php
/*
Other most secured way to conenct:
Using constant variables - 

a) We first create an associative array.
b) We first uppercase the keys of associative array. Because constant variables CANNOT be created on lowercase letters. We NEED to have uppercase letters.
c) After converting it to uppercase, we pass the keys to the parameters of mysqli_connect()
d) How is it more secured?

  It's secured, because the our constant variables NEVER change, even in-case we accidently use the same variable name elsewhere in the project. This will always ensure that the parameters we pass within the function mysqli_connect are the exact parameters.
*/

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

/*Normally we write:
foreach($db as $value)
i.e we take one element from $db array and assign it to $value.
*/
/*Below too, we take each element from associative array and assign it to value. But associatibe array doesn't have integers as indexes, like normal arrays. Instead it has $keys in place of int indexes. Hence "$db as $key" means consider $db array of specific $key, and put that corresponding element into the $value. */
foreach($db as $key=>$value)
{
    $KEY=strtoupper($key);
    define($KEY, $value);
    /*Here we are refernecing to array $db with uppercase $KEY, and storing the constant into the variable, thereby making it constant variabe.*/
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection)
{
    echo "Oops! Disconnection";
}
/*
A simple way to connect, but it isn't not that secured...
$connection = mysqli_connect('localhost', 'root', '','cms');
if($connection)
{
    echo "Connection Established!";
}
*/
?>