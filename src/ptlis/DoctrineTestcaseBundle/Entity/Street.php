<?php

namespace ptlis\DoctrineTestcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Street
 */
class Street
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $street_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $houses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->houses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set street_name
     *
     * @param string $streetName
     * @return Street
     */
    public function setStreetName($streetName)
    {
        $this->street_name = $streetName;

        return $this;
    }

    /**
     * Get street_name
     *
     * @return string 
     */
    public function getStreetName()
    {
        return $this->street_name;
    }

    /**
     * Add houses
     *
     * @param \ptlis\DoctrineTestcaseBundle\Entity\House $houses
     * @return Street
     */
    public function addHouse(\ptlis\DoctrineTestcaseBundle\Entity\House $houses)
    {
        $this->houses[] = $houses;

        return $this;
    }

    /**
     * Remove houses
     *
     * @param \ptlis\DoctrineTestcaseBundle\Entity\House $houses
     */
    public function removeHouse(\ptlis\DoctrineTestcaseBundle\Entity\House $houses)
    {
        $this->houses->removeElement($houses);
    }

    /**
     * Get houses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHouses()
    {
        return $this->houses;
    }
}
