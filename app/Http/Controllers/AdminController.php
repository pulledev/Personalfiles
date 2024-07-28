<?php

namespace App\Http\Controllers;


use App\Models\Files;
use App\Models\Ranks;
use App\Models\Units;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function adminPost(Request $request)
    {
        $formType = $request->input("form_type");
        if ($formType == "rank"){
            $validated = $request->validate([
                "rankName" => "required",
                "color" => "required"
            ]);
            $validated["createdFromUser"] = Auth::id();
            dump($validated);
            Ranks::create($validated);
        }

        if ($formType == "unit"){
            $validated = $request->validate([
                "unitName" => "required",
                "color" => "required"
            ]);
            $validated["createdFromUser"] = Auth::id();
            dump($validated);
            Units::create($validated);
        }


    }
}
