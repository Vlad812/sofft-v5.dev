<?php

/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 12.07.2017
 * Time: 13:31
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *
 * @ORM\Table(name="vendor_list")
 */
class VendorList
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name_vendor;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $site;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $type;

    /**
     * @param mixed $name_vendor
     */
    public function setNameVendor($name_vendor)
    {
        $this->name_vendor = $name_vendor;
    }

    /**
     * @return mixed
     */
    public function getNameVendor()
    {
        return $this->name_vendor;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}