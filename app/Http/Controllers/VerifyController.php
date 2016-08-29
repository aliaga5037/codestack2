<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Http\Requests;
	use App\User;
	use App\Category;
	use App\Question;
	use Auth;
	use DB;
	use Mail;
	class VerifyController extends Controller
	{

			private $user;
			private $role;

			public function __construct()
		{
				$this->middleware('auth');
				$this->user = Auth::user();
				$this->role = $this->user->role;
				
		}




		protected function tables(Request $request)
		{
			
			
			if ($this->role == 'user') {
					return redirect()->intended('/');
				}
			$users = User::all();
			// $result = DB::select('call nots(?)',array(Auth::user()->id));

			$idd=Auth::user()->id;
           $result=nots($idd);
			return view('admin.tables',compact('users','result'));
			
			
			
		}

		protected function notifications(Request $request)
		{
			
			
			if ($this->role == 'user') {
					return redirect()->intended('/');
				}
			// $result = DB::select('call nots(?)',array(Auth::user()->id));

				$idd=Auth::user()->id;
           		$result=nots($idd);
			
			return view('admin.notify',compact('result'));
			
			
			
		}



	    protected function admin(Request $request)
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
	            // $result = DB::select('call nots(?)',array(Auth::user()->id));

	            $idd=Auth::user()->id;
           $result=nots($idd);
	            return view('admin.index',compact('result'));
	        

	        
	    
		}

		protected function questions(Request $request,$id)
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
				$users = User::findOrFail($id);
				// $result = DB::select('call nots(?)',array(Auth::user()->id));
				$idd=Auth::user()->id;
           $result=nots($idd);
	            return view('admin.questions',compact('users','result'));
	        
	    }

	    protected function questionsEdit(Request $request,$id,$quesId)
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
				$user = User::findOrFail($id);
				$ques = Question::findOrFail($quesId); 
				// $result = DB::select('call nots(?)',array(Auth::user()->id));
				$idd=Auth::user()->id;
           $result=nots($idd);
	            return view('admin.ques_edit',compact('user','ques','result'));
	        
	    }


	    protected function questionsUpdate(Request $request,$id,$quesId)
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
			$ques = Question::findOrFail($quesId);
        	$ques->update($request->all());
        	return redirect("/user/".$id."/questions");
	        
	    }
	    protected function quesDel($id)
	    {

	    	if ($this->role == 'user') {
					return redirect()->intended('/');
				}
	    	$ques = Question::findOrFail($id)->delete();    
        
        	return back();
	    }

	    protected function cats(Request $request)
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
	            // $result = DB::select('call nots(?)',array(Auth::user()->id));
	            $idd=Auth::user()->id;
           $result=nots($idd);
	            return view('admin.categories',compact('result'));
	    }

	    protected function ques()
	    {
	        
	       if ($this->role == 'user') {
					return redirect()->intended('/');
				}
	            // $result = DB::select('call nots(?)',array(Auth::user()->id));
	            $idd=Auth::user()->id;
           $result=nots($idd);
	            $ques = Question::orderBy('id','desc')->paginate(25);
	            return view('admin.ques',compact('result','ques'));
	    }

	    public function status($id)
	    {
	    	if ($this->role == 'user') {
					return redirect()->intended('/');
				}

				$user = User::findOrFail($id);
				$userMail = $user->email;
				if ($user->confirm == 0) {
					$user->confirm = 1;
					$subject = 'tesdiqlendi';
				}else{
					$user->confirm = 0;
					$subject = 'dayandirildi';
				}$user->save();


				Mail::send('auth.emails.giris',[],function($mail) use($userMail,$subject) {

                $mail->to($userMail)->subject($subject);
              });

				return back();
	    }
}