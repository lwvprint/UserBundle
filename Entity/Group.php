<?php

namespace LWV\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\UserBundle\Entity\Group
 * 
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="LWV\UserBundle\Entity\GroupRepository")
 */
class Group implements RoleInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="name", type="string", length=30) */
    protected $name;

    /** @ORM\Column(name="role", type="string", length=20, unique=true) */
    protected $role;

    /** @ORM\ManyToMany(targetEntity="User", mappedBy="groups") */
    protected $users;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    // ... getters and setters for each property

    /** @see RoleInterface */
    public function getRole()
    {
        return $this->role;
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Add users
     *
     * @param LWV\UserBundle\Entity\User $users
     */
    public function addUser(\LWV\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}