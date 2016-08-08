<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Question;

use App\Answer;

use Auth;

use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $user;
    private $role;

    public function __construct()
        {
                $this->middleware('auth');
                // $this->user = Auth::user();
                // $this->role = $this->user->role;
                
        } 

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = DB::select('call nots(?)',array(Auth::user()->id));
        return view('cat.add',compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $cat)
    {
        
        if ($this->role == 'user') {
                    return redirect()->intended('/');
                }
        $cat->create($request->all());
       return redirect('/admin/cats');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->role == 'user') {
                    return redirect()->intended('/');
                }
        $catName = Category::findOrFail($id);
        $ques = Question::where('category_id',$id)->orderBy('id','desc')->paginate(5);
        $result = DB::select('call nots(?)',array(Auth::user()->id));
        return view('cat.cat',compact('catName','ques','result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($this->role == 'user') {
                    return redirect()->intended('/');
                }
        $cat = Category::findOrFail($id);
        $result = DB::select('call nots(?)',array(Auth::user()->id));
        return view('cat.edit',compact('cat','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->role == 'user') {
                    return redirect()->intended('/');
                }
        $cat = Category::findOrFail($id);
        $cat->update($request->all());
        return redirect('/admin/cats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->role == 'user') {
                    return redirect()->intended('/');
                }
        $cat = Category::findOrFail($id)->delete();    
        
        return back();
    }
}
