<?php

class User{


    const ALLOWED_ROLES = ['gamemaster', 'player'];
    private $id;
    private $name;
    private $role;

    /**
     * @var string hashed password
     */
    private $password;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setRole($role){
        if (in_array(strtolower($role), self::ALLOWED_ROLES)){
            $this->role = $role;
        }

    }

    public function getName() : string {
        return $this->name;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getRole() :string {
        return $this->role;
    }

}