<?php

namespace App\Http\Requests;

trait UserRules
{
    protected function StoreUserRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'personal_id' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'sex' => 'required|in:M,F',
            'status' => 'required|in:L,S',
            'address_second' => 'string|max:255',
            'apartment_num' => 'integer'
        ];
    }
    protected function UpdateUserRules(): array
    {
        return [
            'name' => 'string|max:255',
            'personal_id' => 'unique:users',
            'email' => 'email|unique:users',
            'phone_number' => 'string',
            'address' => 'string|max:255',
            'date_of_birth' => 'date',
            'sex' => 'in:M,F',
            'status' => 'in:L,S',
            'address_second' => 'string|max:255',
            'apartment_num' => 'integer'
        ];
    }
}
