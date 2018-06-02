<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HardwareRepository")
 */
class Hardware
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Hostname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CPU;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RAM;

    /**
     * @ORM\Column(type="date")
     */
    private $Regdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Owner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Seller;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SerialNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $OfficeLicense;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $WindowsLicense;

    public function getId()
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getHostname(): ?string
    {
        return $this->Hostname;
    }

    public function setHostname(string $Hostname): self
    {
        $this->Hostname = $Hostname;

        return $this;
    }

    public function getCPU(): ?string
    {
        return $this->CPU;
    }

    public function setCPU(string $CPU): self
    {
        $this->CPU = $CPU;

        return $this;
    }

    public function getRAM(): ?string
    {
        return $this->RAM;
    }

    public function setRAM(string $RAM): self
    {
        $this->RAM = $RAM;

        return $this;
    }

    public function getRegdate(): ?\DateTimeInterface
    {
        return $this->Regdate;
    }

    public function setRegdate(\DateTimeInterface $Regdate): self
    {
        $this->Regdate = $Regdate;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->Owner;
    }

    public function setOwner(string $Owner): self
    {
        $this->Owner = $Owner;

        return $this;
    }

    public function getSeller(): ?string
    {
        return $this->Seller;
    }

    public function setSeller(?string $Seller): self
    {
        $this->Seller = $Seller;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->SerialNumber;
    }

    public function setSerialNumber(string $SerialNumber): self
    {
        $this->SerialNumber = $SerialNumber;

        return $this;
    }

    public function getOfficeLicense(): ?string
    {
        return $this->OfficeLicense;
    }

    public function setOfficeLicense(?string $OfficeLicense): self
    {
        $this->OfficeLicense = $OfficeLicense;

        return $this;
    }

    public function getWindowsLicense(): ?string
    {
        return $this->WindowsLicense;
    }

    public function setWindowsLicense(?string $WindowsLicense): self
    {
        $this->WindowsLicense = $WindowsLicense;

        return $this;
    }
}
