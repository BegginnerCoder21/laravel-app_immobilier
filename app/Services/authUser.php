<?php

namespace App\Services;

use phpDocumentor\Reflection\Types\Boolean;

class authUser
{
    public function authUserAdmin(string $email, string $password ): bool
    {
        return auth()->guard('admin')->attempt(['email' => $email,'password' => $password]);
    }
}
