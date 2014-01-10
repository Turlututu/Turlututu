<?php

namespace Sf\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="sf_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
	 * @ORM\Column(name="prenom", type="string", length=255)
	 *
	 * @Assert\NotBlank(message="Prénom :", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="Trop court",
     *     maxMessage="Trop long",
     *     groups={"Registration", "Profile"}
     * )
     */
	 protected $prenom;
	 
	 /**
	 * @ORM\Column(name="nom", type="string", length=255)
	 *
	 * @Assert\NotBlank(message="Nom :", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="Trop court",
     *     maxMessage="Trop long",
     *     groups={"Registration", "Profile"}
     * )
     */
	 protected $nom;

     /**
     * @ORM\Column(name="sexe", type="string", length=255)
     *
     * @Assert\NotBlank(message="Sexe :", groups={"Registration", "Profile"})
     */
     protected $sexe;

    /**
     * @ORM\OneToOne(targetEntity="Sf\UserBundle\Entity\Image", cascade={"persist"})
     */
    protected $image;

	 
	 public function __construct()
    {
        parent::__construct();
        $this->setEnabled = 1;
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
     * Set prenom
     *
     * @return string 
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
     * Set nom
     *
     * @return string 
     */
	public function setNom($nom)
	{
		$this->nom = $nom;
		return $this;
	}
	
	/**
     * Get prenom
     *
     * @return string 
     */
	public function getNom()
	{
		return $this->nom;
	}

    /**
     * Set sexe
     *
     * @return string
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param Sf\UserBundle\Entity\Image $image
     */
    public function setImage(\Sf\UserBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    }

    /**
     * @return Sf\UserBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}
