<?php

namespace ptlis\DoctrineTestcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * House
 */
class House
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $house_name;

    /**
     * @var \ptlis\DoctrineTestcaseBundle\Entity\Street
     */
    private $street;


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
     * Set house_name
     *
     * @param string $houseName
     * @return House
     */
    public function setHouseName($houseName)
    {
        $this->house_name = $houseName;

        return $this;
    }

    /**
     * Get house_name
     *
     * @return string 
     */
    public function getHouseName()
    {
        return $this->house_name;
    }

    /**
     * Set street
     *
     * @param \ptlis\DoctrineTestcaseBundle\Entity\Street $street
     * @return House
     */
    public function setStreet(\ptlis\DoctrineTestcaseBundle\Entity\Street $street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return \ptlis\DoctrineTestcaseBundle\Entity\Street 
     */
    public function getStreet()
    {
        return $this->street;
    }
}
