<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\User;
use App\Models\MobDb;
use App\Models\ItemDb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
        // $client = new \GuzzleHttp\Client();

        // $response = $client->request('POST', 'https://pg-sandbox.paymaya.com/payments/v1/payments', [
        //   'headers' => [
        //     'accept' => 'application/json',
        //     'content-type' => 'application/json',
        //   ],
        // ]);
        
        // echo $response->getBody();
        // exit;
        
        $blogs = [];
        if (file_exists('blog/data/listings.xml')) {
            $xmlstring = simplexml_load_file('blog/data/listings.xml');
            $json = json_encode($xmlstring );
            $blogs = json_decode($json, TRUE);

            if ($blogs && null !== $blogs['listing']) {
                $blogs = array_reverse($blogs['listing']);
                // dd($blogs);
            }
        }

        $results = [];
        $type = request()->input('type');
        $search = request()->input('search');

        if ($type && $search) {
            switch($type) {
                case 'item':
                    $results = ItemDb::where('name_english', 'LIKE', '%'.$search.'%')->paginate();
                    break;
                
                case 'monster':
                    $results = MobDb::where('kName', 'LIKE', '%'.$search.'%')->paginate();
                    break;

                case 'account':
                    $results = User::where('userid', 'LIKE', '%'.$search.'%')->paginate();
                    break;
                
                case 'character':
                    $results = Char::where('name', 'LIKE', '%'.$search.'%')->paginate();
                    break;
            }

            $results = $results->appends(request()->input());
        } else {
            $search = "por";
            $results = MobDb::where('kName', 'LIKE', '%'.$search.'%')->paginate(5);
        }

        $users = User::where('id', '!=', 1);

        return view('home', [
            'users' => $users,
            'results' => $results,
            'type' => $type,
            'blogs' => $blogs
        ]);
    }
}
