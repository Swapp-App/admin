<?php

namespace App\Console\Commands\auth;

use Illuminate\Console\Command;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make {name} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');

        $password = $this->secret('Type your password');
        $confirm = $this->secret('Confirm your password');

        if($password !== $confirm) {
            echo "Passwords do not match";
        }

        $validator = Validator::make(['name' => $name, 'password' => $password, 'email' => $email], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);   

        if($validator->fails())
        {
            print_r($validator->failed());
            return;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
