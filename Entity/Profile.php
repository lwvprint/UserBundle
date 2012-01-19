<?php

namespace LWV\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LWV\UserBundle\Entity\Profile
 * 
 * @ORM\Table(name="user_profile")
 * @ORM\Entity(repositoryClass="LWV\UserBundle\Entity\ProfileRepository")
 */
class Profile
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="pub_name", type="string", length=50)
     */
    protected $pubName;
    
    /**
     * @ORM\Column(name="address", type="string", length=255)
     */
    protected $address;
    
    /**
     * @ORM\Column(name="postcode", type="text")
     */
    protected $postcode;
    
    /**
     * @ORM\Column(name="telephone", type="string", length=25)
     */
    protected $telephone;
    
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="profile")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

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
     * Set pubName
     *
     * @param string $pubName
     */
    public function setPubName($pubName)
    {
        $this->pubName = $pubName;
    }

    /**
     * Get pubName
     *
     * @return string 
     */
    public function getPubName()
    {
        return $this->pubName;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postcode
     *
     * @param text $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * Get postcode
     *
     * @return text 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set user
     *
     * @param LWV\UserBundle\Entity\User $user
     */
    public function setUser(\LWV\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return LWV\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}