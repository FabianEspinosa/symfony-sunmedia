<?php

namespace App\Entity;

use App\Repository\UserEventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserEventRepository::class)
 */
class UserEvent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ip_user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $user_agent;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $country_code;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $event_code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->update_date;
    }

    public function setUpdateDate(?\DateTimeInterface $update_date): self
    {
        $this->update_date = $update_date;

        return $this;
    }

    public function getIpUser(): ?string
    {
        return $this->ip_user;
    }

    public function setIpUser(string $ip_user): self
    {
        $this->ip_user = $ip_user;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): self
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getEventCode(): ?string
    {
        return $this->event_code;
    }

    public function setEventCode(string $event_code): self
    {
        $this->event_code = $event_code;

        return $this;
    }
}
