<?php

namespace checkUp\Http\Controllers;

use Illuminate\Http\Request;
use Models\Patient;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:patient');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.profile');
    }
}
