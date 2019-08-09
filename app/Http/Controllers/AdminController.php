<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AdminController extends Controller
{
    public function index()
    {
      $contact=Contact::all();
      return view('admin.index')->with('contacts',$contact);
    }
}
