<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( auth()->user()->roles->pluck('name')[0] == 'Dealer' ){
            return    redirect('dashboard-dealer');
        }
        return view('pages.dashboard');
    }
    public function email(){
        $data['users'] = User::orderBy('id', 'DESC')->get();
        return view('pages.email-campaign',$data);
    }
    public function submitEmail(Request $request){
       $arrayEmails =  array('iasimriaz@gmail.com');
       $emailSubject = $request->subject;
       $emailBody = $request->email_message;
       Mail::send('pages.email_template',
       ['msg' => $emailBody],
       function($message) use ($arrayEmails, $emailSubject) {
           $message->to($arrayEmails)
           ->subject($emailSubject);
       }
     );

        if(count(Mail::failures()) > 0){
           echo  $errors = 'Failed to send password reset email, please try again.';
        }else{
            echo  $errors = 'send';

        }
        die;
    }


}
