<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Montrek
 */
class Montrek
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $jour;

    /**
     * @var \DateTime
     */
    private $temps;

    /**
     * @var \DateTime
     */
    private $depart;

    /**
     * @var \DateTime
     */
    private $arrivee;

    /**
     * @var int
     */
    private $meteo;

    /**
     * @var string
     */
    private $meteotxt;


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
     * Set jour
     *
     * @param \DateTime $jour
     * @return Montrek
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \DateTime 
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set temps
     *
     * @param \DateTime $temps
     * @return Montrek
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return \DateTime 
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set depart
     *
     * @param \DateTime $depart
     * @return Montrek
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return \DateTime 
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set arrivee
     *
     * @param \DateTime $arrivee
     * @return Montrek
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get arrivee
     *
     * @return \DateTime 
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * Set meteo
     *
     * @param integer $meteo
     * @return Montrek
     */
    public function setMeteo($meteo)
    {
        $this->meteo = $meteo;

        return $this;
    }

    /**
     * Get meteo
     *
     * @return integer 
     */
    public function getMeteo()
    {
        return $this->meteo;
    }

    /**
     * Set meteotxt
     *
     * @param string $meteotxt
     * @return Montrek
     */
    public function setMeteotxt($meteotxt)
    {
        $this->meteotxt = $meteotxt;

        return $this;
    }

    /**
     * Get meteotxt
     *
     * @return string 
     */
    public function getMeteotxt()
    {
        return $this->meteotxt;
    }
    /**
     * @var \AppBundle\Entity\User
     */
    private $randonneur;

    /**
     * @var \AppBundle\Entity\Rando
     */
    private $randonnee;


    /**
     * Set randonneur
     *
     * @param \AppBundle\Entity\User $randonneur
     * @return Montrek
     */
    public function setRandonneur(\AppBundle\Entity\User $randonneur = null)
    {
        $this->randonneur = $randonneur;

        return $this;
    }

    /**
     * Get randonneur
     *
     * @return \AppBundle\Entity\User 
     */
    public function getRandonneur()
    {
        return $this->randonneur;
    }

    /**
     * Set randonnee
     *
     * @param \AppBundle\Entity\Rando $randonnee
     * @return Montrek
     */
    public function setRandonnee(\AppBundle\Entity\Rando $randonnee = null)
    {
        $this->randonnee = $randonnee;

        return $this;
    }

    /**
     * Get randonnee
     *
     * @return \AppBundle\Entity\Rando 
     */
    public function getRandonnee()
    {
        return $this->randonnee;
    }
}
