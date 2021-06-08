<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:role {email} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Изменение роли пользователя';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $role = $this->argument('role');

        if (!$user = User::where('email', $email)->first()) {
            $this->error("Пользователь с таким email не найден {$email}");
            return false;
        }
        try {
            $user->changeRole($role);
        } catch (\DomainException $e) {
            $this->error($e->getMessage());
            return false;
        }
        $this->info('Роль изменена');
        return true;
    }
}
