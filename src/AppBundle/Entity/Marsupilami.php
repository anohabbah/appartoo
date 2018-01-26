<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Sexe;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FosUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class Marsupilami extends FosUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Sexe
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sexe")
     * @Assert\NotBlank(groups={"Registration", "Profile"})
     */
    protected $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string")
     * @Assert\NotBlank()
     */
    protected $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nourriture", type="string")
     * @Assert\NotBlank()
     */
    protected $nourriture;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string")
     * @Assert\NotBlank()
     */
    protected $famille;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     * @Assert\NotBlank()
     */
    protected $age;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Marsupilami", cascade={"persist"})
     */
    protected $amis;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Marsupilami
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return Marsupilami
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Marsupilami
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Marsupilami
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sexe
     *
     * @param Sexe $sexe
     *
     * @return Marsupilami
     */
    public function setSexe(Sexe $sexe = null)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return Sexe
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Add ami
     *
     * @param \AppBundle\Entity\Marsupilami $ami
     *
     * @return Marsupilami
     */
    public function addAmi(\AppBundle\Entity\Marsupilami $ami)
    {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \AppBundle\Entity\Marsupilami $ami
     */
    public function removeAmi(\AppBundle\Entity\Marsupilami $ami)
    {
        $this->amis->removeElement($ami);
    }

    /**
     * Get amis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmis()
    {
        return $this->amis;
    }

    public function __toString()
    {
        return $this->getUsername();
    }
}
