<?php

require_once("config.php");

/*Traz um user pelo ID*/
//$db = new User();
//$db->getById(3);
//echo $db;

/*Traz todos os users*/
//$list = User::getUsers();
//echo json_encode($list);

//Carrega uma lista de user buscada pelo login
//$search = User::search("ana");
//echo json_encode($search);

//Faz o login do usuário;
/* $login = new User;
$login->login("ana", "12345678");
echo $login; */

//Com o construtor é dessa forma/ os valores de setlogin e setsenha são passados como parametros no objetos
//$newUser = new User("João", "Joao1234");

//Sem o construtor é dessa forma;
$newUser = new User();
$newUser->setLogin("Carlos");
$newUser->setSenha("12345678");
$newUser->insertData();
echo $newUser;

//Atualizando os dados de um usuário;
//$user = new User();
//$user->getById(6);
//$user->update("Davi", "abcd1234");
//echo $user;

//Delete um user;
/* $user = new User();

$user->getById(6);
$user->delete(); */

//echo $login;
