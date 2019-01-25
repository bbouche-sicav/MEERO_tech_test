<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
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
    private $marketplace;

    /**
     * @ORM\Column(type="datetime")
     */
    private $order_purchase_date;

    /**
     * @ORM\Column(type="time")
     */
    private $order_purchase_heure;

    /**
     * @ORM\Column(type="float")
     */
    private $order_amount;

    /**
     * @ORM\Column(type="float")
     */
    private $order_tax;

    public function getId()
    {
        return $this->id;
    }

    public function getMarketplace()
    {
        return $this->marketplace;
    }

    public function setMarketplace(string $marketplace): self
    {
        $this->marketplace = $marketplace;

        return $this;
    }

    public function getOrderPurchaseDate()
    {
        return $this->order_purchase_date;
    }

    public function setOrderPurchaseDate(\DateTimeInterface $order_purchase_date): self
    {
        $this->order_purchase_date = $order_purchase_date;

        return $this;
    }

    public function getOrderPurchaseHeure()
    {
        return $this->order_purchase_date;
    }

    public function setOrderPurchaseHeure(\DateTimeInterface $order_purchase_heure): self
    {
        $this->order_purchase_heure = $order_purchase_heure;

        return $this;
    }

    public function getOrderAmount()
    {
        return $this->order_amount;
    }

    public function setOrderAmount(float $order_amount): self
    {
        $this->order_amount = $order_amount;

        return $this;
    }

    public function getOrderTax()
    {
        return $this->order_tax;
    }

    public function setOrderTax(float $order_tax): self
    {
        $this->order_tax = $order_tax;

        return $this;
    }
}
