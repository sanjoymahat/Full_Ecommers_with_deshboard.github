<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminListingController extends Controller
{
    public function index(){
        $ads = Advertisement::latest()->paginate(5);
        return view('backend.list.index',compact('ads'));
    }
}
