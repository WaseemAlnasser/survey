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


class Answer extends Model
{
    protected $table = 'survey_responses';


    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function survey()
    {
        return $this->belongsTo('Survey', 'survey_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo('Question', 'question_id', 'id');
    }

}
