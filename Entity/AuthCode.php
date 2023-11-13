<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * @ORM\Table("oauth2_auth_codes")
 * @ORM\Entity(repositoryClass="App\Repository\AuthCodeRepository")
 * @ORM\AttributeOverrides({
 *     @ORM\AttributeOverride(name="token",
 *         column=@ORM\Column(
 *             name   = "token",
 *             type   = "string",
 *             length = 128
 *         )
 *     )
 * })
 */
class AuthCode extends BaseAuthCode
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $user;

    public function getId(): ?int
    {
        return $this->id;
    }
}
