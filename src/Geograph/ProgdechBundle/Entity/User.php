<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TUsers
 *
 * @ORM\Table(name="t_users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_users_id_user_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_user", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login_user", type="string", length=20, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_user", type="string", length=88, nullable=true)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="salt_user", type="string", length=23, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="role_user", type="string", length=50, nullable=true)
     */
    private $role;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif_user", type="boolean", nullable=true)
     */
    private $actif;
    
    /**
     * @ORM\OneToMany(targetEntity="Bac", mappedBy="user")
     */
    protected $bacs;
    
    /**
     * @ORM\OneToMany(targetEntity="Collecte", mappedBy="user")
     */
    protected $collectes;
    
    /**
     * @ORM\OneToMany(targetEntity="Modelebac", mappedBy="user")
     */
    protected $modelesbac;

    /**
     * @ORM\OneToMany(targetEntity="PointCollecte", mappedBy="user")
     */
    protected $pointscollecte;
    
    /**
     * @ORM\OneToMany(targetEntity="Constat", mappedBy="user")
     */
    protected $constats;
    
    /**
     * @ORM\OneToMany(targetEntity="Donneecollectee", mappedBy="user")
     */
    protected $donneescollectees;
    
    /**
     * @ORM\OneToMany(targetEntity="Tournee", mappedBy="user")
     */
    protected $tournees;
    
    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="user")
     */
    protected $observations;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Bacs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return User
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return User
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Add Bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     * @return User
     */
    public function addBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->Bacs[] = $bacs;

        return $this;
    }

    /**
     * Remove Bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     */
    public function removeBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->Bacs->removeElement($bacs);
    }

    /**
     * Get Bacs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBacs()
    {
        return $this->Bacs;
    }

    /**
     * Add Collectes
     *
     * @param \Geograph\ProgdechBundle\Entity\Collecte $collectes
     * @return User
     */
    public function addCollecte(\Geograph\ProgdechBundle\Entity\Collecte $collectes)
    {
        $this->Collectes[] = $collectes;

        return $this;
    }

    /**
     * Remove Collectes
     *
     * @param \Geograph\ProgdechBundle\Entity\Collecte $collectes
     */
    public function removeCollecte(\Geograph\ProgdechBundle\Entity\Collecte $collectes)
    {
        $this->Collectes->removeElement($collectes);
    }

    /**
     * Get Collectes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCollectes()
    {
        return $this->Collectes;
    }

    /**
     * Add modelesbac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modelesbac
     * @return User
     */
    public function addModelesbac(\Geograph\ProgdechBundle\Entity\Modelebac $modelesbac)
    {
        $this->modelesbac[] = $modelesbac;

        return $this;
    }

    /**
     * Remove modelesbac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modelesbac
     */
    public function removeModelesbac(\Geograph\ProgdechBundle\Entity\Modelebac $modelesbac)
    {
        $this->modelesbac->removeElement($modelesbac);
    }

    /**
     * Get modelesbac
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModelesbac()
    {
        return $this->modelesbac;
    }

    /**
     * Add pointscollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointscollecte
     * @return User
     */
    public function addPointscollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointscollecte)
    {
        $this->pointscollecte[] = $pointscollecte;

        return $this;
    }

    /**
     * Remove pointscollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointscollecte
     */
    public function removePointscollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointscollecte)
    {
        $this->pointscollecte->removeElement($pointscollecte);
    }

    /**
     * Get pointscollecte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPointscollecte()
    {
        return $this->pointscollecte;
    }

    /**
     * Add constats
     *
     * @param \Geograph\ProgdechBundle\Entity\Constat $constats
     * @return User
     */
    public function addConstat(\Geograph\ProgdechBundle\Entity\Constat $constats)
    {
        $this->constats[] = $constats;

        return $this;
    }

    /**
     * Remove constats
     *
     * @param \Geograph\ProgdechBundle\Entity\Constat $constats
     */
    public function removeConstat(\Geograph\ProgdechBundle\Entity\Constat $constats)
    {
        $this->constats->removeElement($constats);
    }

    /**
     * Get constats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConstats()
    {
        return $this->constats;
    }

    /**
     * Add donneescollectees
     *
     * @param \Geograph\ProgdechBundle\Entity\DonneeCollectee $donneescollectees
     * @return User
     */
    public function addDonneescollectee(\Geograph\ProgdechBundle\Entity\DonneeCollectee $donneescollectees)
    {
        $this->donneescollectees[] = $donneescollectees;

        return $this;
    }

    /**
     * Remove donneescollectees
     *
     * @param \Geograph\ProgdechBundle\Entity\DonneeCollectee $donneescollectees
     */
    public function removeDonneescollectee(\Geograph\ProgdechBundle\Entity\DonneeCollectee $donneescollectees)
    {
        $this->donneescollectees->removeElement($donneescollectees);
    }

    /**
     * Get donneescollectees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDonneescollectees()
    {
        return $this->donneescollectees;
    }

    /**
     * Add tournees
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $tournees
     * @return User
     */
    public function addTournee(\Geograph\ProgdechBundle\Entity\Tournee $tournees)
    {
        $this->tournees[] = $tournees;

        return $this;
    }

    /**
     * Remove tournees
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $tournees
     */
    public function removeTournee(\Geograph\ProgdechBundle\Entity\Tournee $tournees)
    {
        $this->tournees->removeElement($tournees);
    }

    /**
     * Get tournees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTournees()
    {
        return $this->tournees;
    }

    /**
     * Add observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     * @return User
     */
    public function addObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations[] = $observations;

        return $this;
    }

    /**
     * Remove observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     */
    public function removeObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations->removeElement($observations);
    }

    /**
     * Get observations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObservations()
    {
        return $this->observations;
    }
}
