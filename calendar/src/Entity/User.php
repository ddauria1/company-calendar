<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="integer") */
    protected $type;

    /** @ORM\Column(type="string", length=100) */
    protected $firstname;

    /** @ORM\Column(type="string", length=100) */
    protected $surname;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100)
     */
    protected $password;

    /** @ORM\Column(type="integer") */
    protected $createdBy;

    /** @ORM\Column(type="datetime") */
    protected $createdDate;

    /** @ORM\Column(type="integer") */
    protected $updatedBy;

    /** @ORM\Column(type="datetime") */
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