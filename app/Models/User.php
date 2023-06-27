<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

// Create a new Capsule instance
$capsule = new Capsule;

// Add connection to the database
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'survey121',
    'username' => 'vssqgod1f8uf',
    'password' => 'brXuL#UQu6!7',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);
$capsule->setAsGlobal();

// Boot Eloquent
$capsule->bootEloquent();


class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
}
