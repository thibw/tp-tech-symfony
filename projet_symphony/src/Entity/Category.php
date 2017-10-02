<?php
/**
 * Created by PhpStorm.
 * User: thibaultweiser
 * Date: 20/09/2017
 * Time: 10:46
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;

/**
 * @ORM\Entity()
 * @ORM\Table(name="category")
 *
 *CREATION DE LA TABLE PRODUCT ET DE SES COLUMNS AVEC LA LIGNE DE COMMANDE
 * php bin/console doctrine:schema:update --force
 */

class Category
{
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function __toString()
    {
       return $this->name;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

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

    #MAPPING!!
    /**
     * @ORM\OneToMany(targetEntity="Product",
     *     mappedBy="category")
     *
     * @var Collection<Product>
     */
    private $products;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;


}