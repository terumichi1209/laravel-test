<?php

namespace App\ValueObjects\User;

use App\ValueObjects\BaseValueObject;

class Name implements BaseValueObject
{
    const MIN_LENGTH = 1;
    const MAX_LENGTH = 255;

    /**
     * @var string
     */
    private $name;

    /**
     * Name constructor.
     * @param string $name
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        if (!$this->isName($name)) {
            throw new \Exception(trans('validation.name'));
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return bool
     */
    private function isName(string $name): bool
    {
        $name_between = self::MIN_LENGTH . ',' . self::MAX_LENGTH;
        return \Validator::make([$name], ['between:' . $name_between])->passes();
    }
}
