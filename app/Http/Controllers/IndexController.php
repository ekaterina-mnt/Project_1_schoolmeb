<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function showContactForm()
    {
        return view('index.contacts');
    }

    public function contact_form_process(ContactFormRequest $request)
    {
        Mail::to('noreply@schoolmeb.st8.ru')->send(new ContactForm($request->validated()));
        
        return redirect('/')->with('flash', 'Данные отправлены успешно, мы скоро свяжемся с Вами!');
    }
}
