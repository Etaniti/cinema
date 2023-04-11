<?php

namespace App\Services;

use App\Models\User;

class ProfileService
{
    public function update($data, $id): bool
    {
        $user = User::findOrFail($id);
        return $profile = $user->update($data);
    }
}
