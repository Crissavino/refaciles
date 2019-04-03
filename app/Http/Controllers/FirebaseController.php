<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('Entra');
        // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-9d875-firebase-adminsdk-wltre-a1b8486a6c.json');
        $serviceAccount = ServiceAccount::fromJsonFile('/refaciles-fb851-firebase-adminsdk-7hzkb-a9a85da3ae.json');
        dd($serviceAccount);
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://refaciles-fb851.firebaseio.com')
        ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('blog/posts')
        ->push([
        'title' => 'Laravel FireBase Tutorial' ,
        'category' => 'Laravel'
        ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }

}