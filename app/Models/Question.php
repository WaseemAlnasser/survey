<?php

require_once 'vendor/autoload.php';

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


class Question extends Model
{
    protected $table = 'survey_questions';
    protected $fillable = ['name', 'email', 'password'];

    public function survey()
    {
        return $this->belongsTo(Survey::class , 'survey_id' , 'id' );
    }

    public function answers()
    {
        return $this->hasMany(Answer::class , 'question_id' , 'id' );
    }
}
