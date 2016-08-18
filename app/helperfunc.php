<?php 



 function nots($value)
{
	   $users = DB::table('notifications')
            ->join('users', 'users.id', '=', 'notifications.user_id')
            ->join('questions', 'questions.id', '=', 'notifications.ques_id')
            ->select('notifications.id', 'notifications.is_read','notifications.user_id',
                'notifications.ques_id','users.name','users.surname','questions.sual','questions.ques_title','questions.user_username')
            ->where('notifications.user_id','=',$value)
            ->where('notifications.is_read','=',0)
            ->get();

            return $users;
}

