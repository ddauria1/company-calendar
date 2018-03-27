<?php

namespace App\Entity;

class User
{
    protected $id;
    protected $type;
    protected $firstname;
    protected $surname;
    protected $email;
    protected $password;
    protected $createdBy;
    protected $createdDate;
    protected $updatedBy;
    protected $updatedDate;

    /**
     * User constructor.
     * @param $id
     * @param $type
     * @param $firstname
     * @param $surname
     * @param $email
     * @param $password
     * @param $createdBy
     * @param $createdDate
     * @param $updatedBy
     * @param $updatedDate
     */
    public function __construct()
    {
        $this->email = "";
        $this->password = "";
    }


    public function getId() :int {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getType() :int
    {
        return $this->type;
    }


    public function setType(int $type)
    {
        $this->type = $type;
    }


    public function getFirstname() :string
    {
        return $this->firstname;
    }


    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }


    public function getSurname() :string
    {
        return $this->surname;
    }


    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }


    public function getEmail() :string
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword() :string
    {
        return $this->password;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }


    public function getCreatedBy() :int
    {
        return $this->createdBy;
    }


    public function setCreatedBy(int $createdBy)
    {
        $this->createdBy = $createdBy;
    }


    public function getCreatedDate() :\DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;
    }


    public function getUpdatedBy()  :int
    {
        return $this->updatedBy;
    }


    public function setUpdatedBy(int $updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }


    public function getUpdatedDate() :\DateTime
    {
        return $this->updatedDate;
    }


    public function setUpdatedDate(\DateTime $updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }

}