<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;
use Illuminate\Support\Facades\Hash;

class Password implements BaseValueObject
{
    const MIN_LENGTH = 4;
    const MAX_LENGTH = 10;

    /** @var string */
    private $password;

    public function __construct(string $password)
    {
        $this->password = $this->hash($password);
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function isRawPassword(string $password): bool
    {
        $pass_between = self::MIN_LENGTH . ',' . self::MAX_LENGTH;
        return \Validator::make([$password], ['between:' . $pass_between])->passes();
    }

    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string
    {
        return self::isRawPassword($password) ? Hash::make($password) : $password;
    }
}
