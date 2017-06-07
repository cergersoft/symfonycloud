<?php

namespace Rac\RacBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assistance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rac\RacBundle\Entity\AssistanceRepository")
 */
class Assistance
{
    
    /**
     * @ORM\ManyToOne(targetEntity="GcaBundle", inversedBy="Assistance")
     * @ORM\JoinColumn(name="gca_id", referencedColumnName="gca_id", onDelete="CASCADE")
     */
    protected $gcsa;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="assistence_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="assistence_createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var string
     *
     * @ORM\Column(name="assistence_observations", type="text")
     */
    private $observations;

    /**
     * @var boolean
     *
     * @ORM\Column(name="assistence_status", type="boolean")
     */
    private $status;


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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Assistance
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
     * Set observations
     *
     * @param string $observations
     * @return Assistance
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string 
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Assistance
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    

    /**
     * Set gcsa
     *
     * @param \Rac\RacBundle\Entity\GcaBundle $gcsa
     * @return Assistance
     */
    public function setGcsa(\Rac\RacBundle\Entity\GcaBundle $gcsa = null)
    {
        $this->gcsa = $gcsa;

        return $this;
    }

    /**
     * Get gcsa
     *
     * @return \Rac\RacBundle\Entity\GcaBundle 
     */
    public function getGcsa()
    {
        return $this->gcsa;
    }
}
