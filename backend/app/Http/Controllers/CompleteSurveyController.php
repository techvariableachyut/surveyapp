<?php

namespace App\Http\Controllers;

use Auth;
use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompleteSurveyController extends Controller{
    
    public function getall(){
        $all = DB::table('questions')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
    }
}
