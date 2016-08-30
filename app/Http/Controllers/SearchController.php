<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Question;
use App\Http\Requests;
use DB;

class SearchController extends Controller
{

    public function show(Request $request)
   {
       $this->validate($request, [
           'search' => 'required'
       ]);
       $questions = Question::where('ques_title', 'LIKE', '%' . $request->search . '%')
           ->orWhere('user_username', 'LIKE', '%' . $request->search . '%')
           ->orderBy('id','desc')
           ->paginate(10);
          
       return view('search', compact('questions'));
   }

    public function search(Request $request)
    {

        if ($request->ajax())
        {
            
          $ques = Question::where('ques_title', 'LIKE', '%' . $request->data . '%')
          ->orWhere('sual', 'LIKE', '%' . $request->data . '%')
          ->orderBy('id','desc')
          ->with('category','user')
          ->limit(5)
          ->get();
         
         
          // return response()->json(array('res'=> $questions), 200);
          return view('s',compact('ques'));
        }
    }
}
