<?php

require_once("config.php");

/* $sql = new Sql();

$users = $sql->select("SELECT * FROM tb_users"); */

$db = new User();

$db->getById(3);

echo $db;
