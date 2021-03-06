<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rando
 */
class Rando
{
    public $phrando;

//    public $filekml;

    public function __toString()
    {
        return $this->getLibelle();
    }

    protected function getUploadDir()
    {
        return 'uploads/photosrandos';
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    public function getWebPath()
    {
        return null === $this->photo ? null : $this->getUploadDir().'/'.$this->photo;
    }
    public function getAbsolutePath()
    {
        return null === $this->photo ? null : $this->getUploadRootDir().'/'.$this->photo;
    }

//    protected function getUploadDirKML()
//    {
//        return 'uploads/fileskml';
//    }
//    protected function getUploadRootDirKML()
//    {
//        return __DIR__.'/../../../web/'.$this->getUploadDirKML();
//    }
//    public function getWebPathKML()
//    {
//        return null === $this->fickml ? null : $this->getUploadDirKML().'/'.$this->fickml;
//    }
//    public function getAbsolutePathKML()
//    {
//        return null === $this->fickml ? null : $this->getUploadRootDirKML().'/'.$this->fickml;
//    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        // Add your code here
        if (null !== $this->phrando) {
            // do whatever you want to generate a unique name
            $this->photo = uniqid().'.'.$this->phrando->guessExtension();
        }
//        if (null !== $this->filekml) {
//            // do whatever you want to generate a unique name
//            $this->fickml = uniqid().'.'.$this->filekml->getClientOriginalExtension() ;
//        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null !== $this->phrando) {
            // if there is an error when moving the file, an exception will
            // be automatically thrown by move(). This will properly prevent
            // the entity from being persisted to the database on error

            $this->phrando->move($this->getUploadRootDir(), $this->photo);

            unset($this->phrando);
        }
//        if (null !== $this->filekml) {
//            // if there is an error when moving the file, an exception will
//            // be automatically thrown by move(). This will properly prevent
//            // the entity from being persisted to the database on error
//
//            $this->filekml->move($this->getUploadRootDirKML(), $this->fickml);
//
//            unset($this->filekml);
//        }
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        // Add your code here
        if ($phrando = $this->getAbsolutePath()) {
            unlink($phrando);
        }
//        if ($filekml = $this->getAbsolutePathKML()) {
//            unlink($filekml);
//        }
    }

    // GENERATED CODE

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var string
     */
    private $depart;

    /**
     * @var string
     */
    private $arrivee;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $niveau;

    /**
     * @var string
     */
    private $distance;

    /**
     * @var \DateTime
     */
    private $duree;

    /**
     * @var string
     */
    private $fickml;

    /**
     * @var string
     */
    private $photo;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Rando
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set depart
     *
     * @param string $depart
     * @return Rando
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string 
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set arrivee
     *
     * @param string $arrivee
     * @return Rando
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get arrivee
     *
     * @return string 
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Rando
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     * @return Rando
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set distance
     *
     * @param string $distance
     * @return Rando
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return string 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     * @return Rando
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set fickml
     *
     * @param string $fickml
     * @return Rando
     */
    public function setFickml($fickml)
    {
        $this->fickml = $fickml;

        return $this;
    }

    /**
     * Get fickml
     *
     * @return string 
     */
    public function getFickml()
    {
        return $this->fickml;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Rando
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
}
