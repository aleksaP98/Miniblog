<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require base_path().'/vendor/autoload.php';

class MailController extends Controller
{
    public function sendMail(Request $request){
        
        $validator = Validator::make($request->all(),[
            'message' => 'required|max:255'
        ])->validateWithBag('errors');

    $user = session()->get('user');

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = env('MAIL_HOST');
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = env('MAIL_USERNAME');
    $mail->Password   = env('MAIL_PASSWORD');                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom($user->email, $user->firstName);
    $mail->addAddress('aleksa.addmin@gmail.com', 'Admin');

    $mail->isHTML(true);
    $mail->Subject = 'New message from user';
    $mail->Body    = nl2br("First Name: ".$user->firstName."\r\n Last Name: ". $user->lastName ."\r\n Email: ". $user->email . " \r\n Message: ". $request->input('message'));

    $mail->send();
        return redirect()->route('about')->with('message','Message sent');
    }
}
