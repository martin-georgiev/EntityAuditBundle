<?php

namespace SimpleThings\EntityAudit\Tests\Fixtures\Core;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserAudit
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id;
    /** @ORM\Column(type="string") */
    private $name;

    /** @ORM\OneToOne(targetEntity="ProfileAudit", mappedBy="user") */
    private $profile;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param ProfileAudit $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
        $profile->setUser($this);
    }
}
