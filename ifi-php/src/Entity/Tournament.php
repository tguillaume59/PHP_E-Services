<?php
/**
 * Created by PhpStorm.
 * User: tartara
 * Date: 29/11/17
 * Time: 11:20
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ApiResource()
 */
class Tournament
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column{type="integer"}
     */
    public $id;

    /**
     * @ORM\Column{tye="string"}
     */
    public $name;

    /**
     * @ORM\Column{type"datetime"}
     */
    public $createAt;


}