<?php

class User{
    private $id_user;
    private $login;
    private $senha;
    private $dt_register;

    public function getId_user(){
        return $this->id_user;
    }

    public function setId_user($value) {
        $this->id_user = $value;   
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($value) {
        $this->login = $value;   
    }

    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($value) {
        $this->senha = $value;   
    }
    
    public function getDt_register(){
        return $this->dt_register;
    }
    
    public function setDt_register($value) {
        $this->dt_register = $value;   
    }

    public function __construct($login ="", $password = ""){
        $this->setLogin($login);
        $this->setSenha($password);
    }
    
    public function setdata($data){

        $this-> setId_user($data['id_user']);
        $this-> setLogin($data['login']);
        $this-> setSenha($data['senha']);
        $this-> setDt_register(new DateTime($data['dt_register']));
    }

    public function getById($id){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE id_user = :ID", array(
            ":ID"=>$id
        ));

        if(isset($results[0])){
            $this->setdata($results[0]);
        };
    }

    public static function getUsers(){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users ORDER BY login");

    }

    public static function search($login){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users WHERE login LIKE :SEARCH ORDER BY login", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login, $password){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE login = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if(isset($results[0])){
            $this->setdata($results[0]);
        } else {
            throw new Exception("Login e/ou senha inválidos.");
        };
    }

    public function insertData(){
        $sql = new Sql();

        $results = $sql->select("CALL sp_user_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getLogin(),
            ':PASSWORD'=>$this->getSenha()
        ));

        if(count($results) > 0){
            $this->setdata($results[0]);
        }
    }

    public function update($login, $password){
        $this->setLogin($login);
        $this->setSenha($password);

        $sql = new Sql();

        $sql->executeQuery("UPDATE tb_users SET login = :LOGIN, senha = :PASSWORD WHERE id_user = :ID", array(
            ':LOGIN'=>$this->getLogin(),
            ':PASSWORD'=>$this->getSenha(),
            ':ID'=>$this->getId_user()        
        ));

    }

    public function delete(){
        $sql = new Sql();

        $sql->executeQuery("DELETE FROM tb_users WHERE id_user = :ID", array(
            ':ID'=>$this->getId_user()
        ));

        $this->setId_user(0);
        $this->setLogin("");
        $this->setSenha("");
        $this->setDt_register(new DateTime());
    }    
    
    public function __toString()
    {
        return json_encode(array(
            "id_user"=>$this->getId_user(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "dt_register"=>$this->getDt_register()->format("d/m/Y H:i:s"),
        ));
    }
}