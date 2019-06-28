<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;

class Email implements BaseValueObject
{
    /**
     * @var string
     */
    private $email;

    /**
     * Email constructor.
     * @param string $email
     * @throws \Exception
     */
    public function __construct(string $email)
    {
        if (!$this->isEmail($email)) {
            throw new \Exception(trans('validation.email'));
        }
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return bool
     */
    private function isEmail(string $email): bool
    {
        return \Validator::make([$email], ['email'])->passes();
    }
}
