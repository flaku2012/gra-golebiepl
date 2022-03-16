<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class WerifyPasswordOnDatabaseRule implements Rule
{

    public $database_password;
    public $input_password;

    public function __construct($database_password, $input_password)
    {
        $this->database_password = $database_password;
        $this->input_password = $input_password;
    }

    public function passes($attribute, $value)
    {

        if(Hash::check($this->database_password, $this->input_password))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function message()
    {
        return 'Hasło nie zgadza się z pierwotnym.';
    }
}
