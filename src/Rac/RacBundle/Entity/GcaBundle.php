<?php

namespace Rac\RacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GcaBundle
 *
 * @ORM\Table(name="Gsca")
 * @ORM\Entity(repositoryClass="Rac\RacBundle\Entity\GcaBundleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class GcaBundle
{
    
    /**
     * @ORM\OneToMany(targetEntity="Assistance", mappedBy="GcaBundle")
     */
    protected $assistanced;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="gca_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_lastname", type="string", length=50)
     */
    private $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Ganj_identificationcard", type="string", length=10)
     */
    private $identificationcard;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_mail", type="string", length=70)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_address", type="string", length=100)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_phone", type="string", length=10)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gca_createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_photo", type="string", length=100)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_birthdate", type="string", length=10)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_annexed", type="string", length=250)
     */
    private $annexed;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_eps", type="string", length=50)
     */
    private $eps;

    /**
     * @var string
     *
     * @ORM\Column(name="gca_vehicle", type="string", length=50)
     */
    private $vehicle;

    /**
     * @var integer
     *
     * @ORM\Column(name="gca_commune", type="integer", length=10)
     */
    private $commune;

    /**
     * @var float
     *
     * @ORM\Column(name="gca_balances", type="float")
     */
    private $balances;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gca_active", type="boolean")
     */
    private $active;
    
    
     public function __construct()
    {
        $this->assistanced = new ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     * @return GcaBundle
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
     * @return GcaBundle
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
     * Set mail
     *
     * @param string $mail
     * @return GcaBundle
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
     * @return GcaBundle
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
     * @return GcaBundle
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return GcaBundle
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return GcaBundle
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
     * Set birthdate
     *
     * @param string $birthdate
     * @return GcaBundle
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return string 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set annexed
     *
     * @param string $annexed
     * @return GcaBundle
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
     * @return GcaBundle
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
     * Set vehicle
     *
     * @param string $vehicle
     * @return GcaBundle
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get vehicle
     *
     * @return string 
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set commune
     *
     * @param integer $commune
     * @return GcaBundle
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return integer 
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set balances
     *
     * @param float $balances
     * @return GcaBundle
     */
    public function setBalances($balances)
    {
        $this->balances = $balances;

        return $this;
    }

    /**
     * Get balances
     *
     * @return float 
     */
    public function getBalances()
    {
        return $this->balances;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return GcaBundle
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
    
    
     // method persint
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createAt = new \DateTime();
    }
   
    /**
     * Add assistanced
     *
     * @param \Rac\RacBundle\Entity\Assistance $assistanced
     * @return GcaBundle
     */
    public function addAssistanced(\Rac\RacBundle\Entity\Assistance $assistanced)
    {
        $this->assistanced[] = $assistanced;

        return $this;
    }

    /**
     * Remove assistanced
     *
     * @param \Rac\RacBundle\Entity\Assistance $assistanced
     */
    public function removeAssistanced(\Rac\RacBundle\Entity\Assistance $assistanced)
    {
        $this->assistanced->removeElement($assistanced);
    }

    /**
     * Get assistanced
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssistanced()
    {
        return $this->assistanced;
    }
}
