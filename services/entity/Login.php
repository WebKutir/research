<?php

namespace entity;

/**
@Entity
@Table(name="login") */
class Login
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=255)
     */
    private $userid;
    /**
     * @Column(type="string", length=255)
     */
    private $password;

    public function getId(){
        return $this->id;
    }

    public function setUserid($userid){
        $this->userid = $userid;
    }

    public function getUserid(){
        return $this->userid;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

}