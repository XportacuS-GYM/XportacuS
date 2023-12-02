<?php

namespace App\Models\Clases;

use App\Models\DB\DBusers;

class suscriptor{
    private String $name, $lastname, $email, $address, $statusSubscription, $subscriptionDate;
    private int $age;

    public function __construct(String $name, String $lastname, String $email, String $address, int $age, String $statusSubscription, String $subscriptionDate)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->address = $address;
        $this->age = $age;
        $this->statusSubscription = $statusSubscription;
        $this->subscriptionDate = $subscriptionDate;
    }

 
    public function getName()
    {
        return $this->name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddres()
    {
        return $this->address;
    }

    public function getStatusSubscription()
    {
        return $this->statusSubscription;
    }

    public function getSubscriptionDate()
    {
        return $this->subscriptionDate;
    }

    public function getAge()
    {
        return $this->age;
    }

 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail(String $email)
    {
        $this->email = $email;
    }

    public function setAddres(string $addres)
    {
        $this->address = $addres;
    }

    public function setStatusSubscription(string $statusSubscription)
    {
        $this->statusSubscription = $statusSubscription;
    }

    public function setSubscriptionDate(string $subscriptionDate)
    {
        $this->subscriptionDate = $subscriptionDate;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setActivo(String $status)
    {
        $this->statusSubscription = $status;
        $db = new DBusers;
        $db->ActualizaDatos($this->email);
    }
}