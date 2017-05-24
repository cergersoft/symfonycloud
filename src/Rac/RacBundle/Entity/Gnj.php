<?php

namespace Rac\RacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gnj
 *
 * @ORM\Table(name="Ganj")
 * @ORM\Entity(repositoryClass="Rac\RacBundle\Entity\GnjRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Gnj
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Ganj_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_firstname", type="string", length=70)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_lastname", type="string", length=70)
     */
    private $lastname;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_identificationcard", type="string", length=10)
     */
    private $identificationcard;
    

    /**
     * @var \string
     *
     * @ORM\Column(name="Ganj_birthdate", type="string", length=10)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_mail", type="string", length=80)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_address", type="string", length=100)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_contactname", type="string", length=80)
     */
    private $contactname;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_contactphone", type="string", length=20)
     */
    private $contactphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Ganj_createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_Photo", type="string", length=250)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_annexed", type="string", length=200)
     */
    private $annexed;

    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_eps", type="string", length=50)
     */
    private $eps;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Ganj_active", type="boolean")
     */
    private $active;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Gnj
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Gnj
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    
    function getIdentificationcard() {
        return $this->identificationcard;
    }

    function setIdentificationcard($identificationcard) {
        $this->identificationcard = $identificationcard;
    }
    

    /**
     * Set birthdate
     *
     * @param \string $birthdate
     * @return Gnj
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \string 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Gnj
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Gnj
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
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
     * Set phone
     *
     * @param string $phone
     * @return Gnj
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set contactname
     *
     * @param string $contactname
     * @return Gnj
     */
    public function setContactname($contactname)
    {
        $this->contactname = $contactname;

        return $this;
    }

    /**
     * Get contactname
     *
     * @return string 
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * Set contactphone
     *
     * @param string $contactphone
     * @return Gnj
     */
    public function setContactphone($contactphone)
    {
        $this->contactphone = $contactphone;

        return $this;
    }

    /**
     * Get contactphone
     *
     * @return string 
     */
    public function getContactphone()
    {
        return $this->contactphone;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Gnj
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Gnj
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set annexed
     *
     * @param string $annexed
     * @return Gnj
     */
    public function setAnnexed($annexed)
    {
        $this->annexed = $annexed;

        return $this;
    }

    /**
     * Get annexed
     *
     * @return string 
     */
    public function getAnnexed()
    {
        return $this->annexed;
    }

    /**
     * Set eps
     *
     * @param string $eps
     * @return Gnj
     */
    public function setEps($eps)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get eps
     *
     * @return string 
     */
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Gnj
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }
    
    
    


}
