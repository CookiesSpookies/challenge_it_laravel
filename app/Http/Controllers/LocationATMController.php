<?php

namespace App\Http\Controllers;

use App\Models\LocationATM;

class LocationATMController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            "locationATMs" => LocationATM::all()
        ],200);
    }
}
