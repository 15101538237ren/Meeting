<?php
/**
 * Created by PhpStorm.
 * User: ren
 * Date: 15/2/12
 * Time: 下午12:38
 */
error_reporting(E_ERROR);
$server='127.0.0.1';
$user='root';
$pwd='******';
$db='meeting';

include('adodb/adodb.inc.php');
$conn = &ADONewConnection('mysql');
$conn->Connect($server, $user, $pwd, $db);