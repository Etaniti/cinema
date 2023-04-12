<?php

namespace App\Services;

use App\Models\User;

class ProfileService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return bool
     */
    public function update($data, $id): bool
    {
        $user = User::findOrFail($id);
        return $profile = $user->update($data);
    }
}
