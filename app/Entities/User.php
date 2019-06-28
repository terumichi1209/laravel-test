<?php

namespace App\Entities;

use App\ValueObjects\User\Name;
use App\ValueObjects\User\Email;
use App\ValueObjects\User\Password;

class User
{
    /**
     * @var Name
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var Password
     */
    private $password;

    /**
     * UserEntity constructor.
     * @param Name $name
     * @param Email $email
     * @param Password $password
     */
    public function __construct(Name $name, Email $email, Password $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name->get();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email->get();
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password->get();
    }
}
