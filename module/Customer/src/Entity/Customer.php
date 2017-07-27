<?php

namespace Customer\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @var ORM\Entity */

/**
 * @ORM\Entity
 * @ORM\Table(name="customer")
 */
class Customer implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=64)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=64)
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column(name="country", type="string", length=2)
     * @var string
     */
    private $country;

    /**
     * Customer constructor.
     *
     * @param int    $id
     * @param string $firstName
     * @param string $lastName
     * @param string $country
     */
    public function __construct(int $id, string $firstName, string $lastName, string $country)
    {
        $this->id        = $id;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->country   = $country;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
            'country'    => $this->country,
        ];
    }
}
