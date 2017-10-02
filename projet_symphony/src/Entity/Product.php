<?php
/**
 * Created by PhpStorm.
 * User: thibaultweiser
 * Date: 19/09/2017
 * Time: 10:48
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ProductRepository;
/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
 *
 *CREATION DE LA TABLE PRODUCT ET DE SES COLUMNS AVEC LA LIGNE DE COMMANDE
 * php bin/console doctrine:schema:update --force
 */

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */

class Product
{

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Category",
     *     inversedBy="product"
     * )
     *
     * @var Category
     */
    private $category;
    /**
     * @ORM\OneToMany(
     *     targetEntity="Comment",
     *     mappedBy="product"
     * )
     * @ORM\OrderBy({"id" = "desc"})
     * @var Comment
     */
    private $comment;

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @ORM\Column(type="text")
     * @var string
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @Assert\NotBlank()
     * @Assert\Image()
     * @ORM\Column(type="string")
     * @var string
     */
    private $image;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function __construct()
    {
        $this->comment = new ArrayCollection();
    }
}
