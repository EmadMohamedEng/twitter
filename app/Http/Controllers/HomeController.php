<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Twitt;
use App\TwittLike;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitts = Twitt::get();
        return view('front.twitts', compact('twitts'));
    }

    public function twitt(Request $request)
    {
        //  print_r($request->all() ) ;
        $twitt_text = $request->twitt_text;
        if ($twitt_text == "") {
            return Response(array('status' => "fail"));
        } else {

            $twitt = new Twitt();
            $twitt->twitt = $twitt_text;
            $twitt->user_id = Auth::user()->id;
            $twitt->save();

            $data = view('front.twitt_inner', compact('twitt'))->render();
            return Response(array('status' => "success", 'data' => $data));
        }


    }


    public function twittLikeDislike(Request $request)
    {
        $twitt_id = $request->twitt_id;
        $user_id = Auth::user()->id;
        if ($twitt_id == "") {
            return Response(array('status' => "fail"));

        }

        $TwittLike = TwittLike::where('user_id', $user_id)->where('twitt_id', $twitt_id)->first();

        if ($TwittLike) {  // remove
            $TwittLike->delete();
            return Response(array('status' => "success",'result'=>'remove'));
        } else { // add
            $TwittLike = new TwittLike();
            $TwittLike->user_id = $user_id;
            $TwittLike->twitt_id = $twitt_id;
            $TwittLike->save() ;

            return Response(array('status' => "success",'result'=>'add'));

        }


    }


    public function updateTwitts()
    {
        $twitts = Twitt::get();
        $data = view('front.twitts_update', compact('twitts'))->render();
        return Response(array('status' => "success", 'data' => $data));
    }


}
