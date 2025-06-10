<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function LifeCycleTest()
    {
        app()->bind('LifeCycleTest', function(){
            return 'ライフサイクル';
        });

        $test = app()->make('LifeCycleTest');

        //サービスコンテナ無しの場合
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        //サービスコンテナありの場合
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app());
    }
}

class Sample
{
    public $message;
    public function __construct(Message $message) {
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}

class Message
{
    public function send()
    {
        echo('メッセージ表示');
    }
}