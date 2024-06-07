<?php

namespace Admin\XuongOop\Rules;

use Rakit\Validation\Rule;

class PhoneRule extends Rule
{
    protected $message = ":attribute : Không đúng định dạng";

    public function check($value) : bool
    {
        return preg_match('/^[0-9]{10}+$/', $value);
    }
}