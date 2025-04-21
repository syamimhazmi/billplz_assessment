<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PasswordGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:password-generator
    {--length=8 : Length of a password}
    {--small=true : Include small letters}
    {--capital=true : Include capital letters}
    {--numbers=true : Include numbers}
    {--symbols=true : Include symbols}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Password generator';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $small_letters = 'abcdefghijklmnopqrstuvwxyz';
        $capital_letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = '0123456789';
        $symbols = ['!', '#', '$', '%', '&', '(', ')', '*', '+', '@', '^'];

        $characters = '';
        $password = '';
        $include = [];

        $options = $this->options();

        if (boolval($options['small'])) {
            $characters .= $small_letters;

            $include[] = $small_letters[rand(0, strlen($small_letters) - 1)];
        }

        if (boolval($options['capital'])) {
            $characters .= $capital_letters;

            $include[] = $capital_letters[rand(0, strlen($capital_letters) - 1)];
        }

        if (boolval($options['numbers'])) {
            $characters .= $numbers;

            $include[] = $numbers[rand(0, strlen($numbers) - 1)];
        }

        if (boolval($options['symbols'])) {
            $symbol_string = implode('', $symbols);

            $characters .= $symbol_string;

            $include[] = $symbols[array_rand($symbols)];
        }

        if (empty($characters)) {
            $this->error("Error: At least one character type must be selected");
        }

        $password = implode('', $include);

        $char_length = strlen($characters);

        while (strlen($password) < intval($options['length'])) {
            $password .= $characters[rand(0, $char_length - 1)];
        }

        $this->info("success generating password");
        $this->line("password: {$password}");
    }
}
