<?php

require_once 'vendor/autoload.php';
require_once 'app/Models/Question.php';


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

// Create a new Capsule instance
$capsule = new Capsule;
$domain = $_SERVER['HTTP_HOST'];
if ($domain == 'survey.local') {
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'survey',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ]);
} else {
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'survey121',
        'username' => 'vssqgod1f8uf',
        'password' => 'brXuL#UQu6!7',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ]);
}
// Add connection to the database

$capsule->setAsGlobal();

// Boot Eloquent
$capsule->bootEloquent();


class Survey extends Model
{
    protected $table = 'surveys';
    protected $fillable = ['title', 'description'];

    public function questions()
    {
        return $this->hasMany(Question::class , 'survey_id' , 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class , 'survey_id' , 'id');
    }
}
