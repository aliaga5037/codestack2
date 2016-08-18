<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\QuestionRequest;

use App\Http\Requests;

use App\User;

use App\Question;

use App\Category;

use DB;

use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    
    public function __construct()
            {
                    $this->middleware('auth');
                    
            }

    public function index($id)
    {
        $category = Category::findOrFail($id);
        return view('question.ques_add')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(QuestionRequest $request,$id)
    {      
        $cat = Category::findOrFail($id);
        $user = Auth::user();
        $ques = new Question;
        $ques->sual = $request->sual;
        $ques->user_id = $user->id;
        $ques->status = $user->role;
        $ques->user_username = $user->username;
        $ques->ques_title=$request->quest_title;
        $cat->question()->save($ques);
        $usr_id = DB::select( DB::raw("SELECT id FROM users WHERE role != 'user'") );

        for ($i=0; $i < count($usr_id) ; $i++) { 
            $ui = (string)$usr_id[$i]->id;
            if (Auth::user()->id != $ui) {
          
        $notification = DB::select( DB::raw("INSERT INTO  notifications (user_id,ques_id) VALUE ('$ui','$ques->id')" ));
        }
        }
         
        return redirect("/cat/$cat->id");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($catID, $quesID)
{

    $question = Question::findOrFail($quesID);
    $result = DB::select('call nots(?)',array(Auth::user()->id));
    foreach ($result as $res) {
       
        DB::select( DB::raw(" UPDATE notifications SET is_read = 1 WHERE user_id = $res->user_id AND ques_id = $quesID" ));
    }
    return view('question.ques_show', compact('question'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$quesId)
    {
        
        if ($id != Auth::user()->id) {
                    return redirect()->intended('/');
                }
        $ques = Question::findOrFail($quesId);
        return view('question.ques_update',compact('id','ques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id,$quesId)
    {
        if ($id != Auth::user()->id) {
                    return redirect()->intended('/');
                }
        $ques = Question::findOrFail($quesId);
        $ques->update($request->all());
        return redirect("/$id/myQuestions");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$quesId)
    {
        $ques = Question::findOrFail($quesId);
        if ($id != Auth::user()->id || $ques->user_id != $id) {

                    return redirect()->intended('/');
                }
        
        $ques->delete();    
        
        return back();
    }
}
