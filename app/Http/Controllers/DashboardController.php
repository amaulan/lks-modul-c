<?php

namespace App\Http\Controllers;

use Redirect;
use Session;

use App\RegistrasiPeserta;
use App\Kontingen;
use App\BidangLomba;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$data['overview'] 		= Kontingen::all();
    	$data['bidang']  		= BidangLomba::all();
    	return view('dashboard', compact('data'));
    }
}
