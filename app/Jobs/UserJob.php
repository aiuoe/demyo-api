<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name, $lastname, $email, $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserRequest $request)
    {
        $this->name = strtolower($request->name);
        $this->lastname = strtolower($request->lastname);
        $this->email = strtolower($request->email);
        $this->password = bcrypt($request->password);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password
        ]);

        return response(200);
    }
}
