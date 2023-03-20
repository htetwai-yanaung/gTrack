<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'company_name' => 'required_if:role,client',

            'company_id' => 'required_if:role,driver',
            'name' => 'required_if:role,driver',
            'age' => 'required_if:role,driver',
            'phone' => 'required_if:role,driver',
            'address' => 'required_if:role,driver',
            'license' => 'required_if:role,driver',

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'company_name' => $input['company_name'],

            'company_id' => $input['company_id'],
            'name' => $input['name'],
            'age' => $input['age'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'license' => $input['license'],

            'role' => $input['role'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
