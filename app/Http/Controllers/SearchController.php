<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{

    public function show(Request $request)
   {
       $this->validate($request, [
           'search' => 'required'
       ]);
       $questions = DB::table('questions')
           ->where('sual', 'LIKE', '%' . $request->search . '%')
           ->orWhere('user_username', 'LIKE', '%' . $request->search . '%')->get();
       return view('search', compact('questions'));
   }

    public function search(Request $request)
    {
        if ($request->ajax())
        {
            $output = "";
            $questions = DB::table('questions')->where('sual', 'LIKE', '%' . $request->search . '%')
                                                ->orWhere('user_username', 'LIKE', '%' . $request->search . '%')->get();
            if ($questions)
            {
                foreach($questions as $key => $question) {
                    $output =   "<tr>" .
                                    "<td><a href='/$question->category_id/question/$question->id'>" . $question->sual . "</a></td>" .
                                "</tr>";
                }
            }
            return Response($output);
        }
    }
}
