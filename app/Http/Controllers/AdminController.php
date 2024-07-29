<?php

namespace App\Http\Controllers;


use App\Models\EntryType;
use App\Models\Files;
use App\Models\Ranks;
use App\Models\Units;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function admin()
    {
        $units = Units::all();
        $ranks = Ranks::all();

        return view('admin', ['units' => $units, 'ranks' => $ranks]);
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

            if (Ranks::create($validated)){
                Log::info('User {userId} created unit {name}', ['userId'=>Auth::id(), 'name' => $validated["rankName"]]);
                return redirect(route("admin"))->with("msg", "Einheit wurde erstellt");
            }
            Log::notice('Failed to create rank {name} by {id}', ['userId' => Auth::user(), 'name' => $validated["rankName"]]);
            return redirect(route("admin"))->with("msg","Erstellung der Unit fehlgeschlagen");
        }

        if ($formType == "unit"){
            $validated = $request->validate([
                "unitName" => "required",
                "color" => "required"
            ]);
            $validated["createdFromUser"] = Auth::id();

            if (Units::create($validated)){
                Log::info('User {userId} created unit {name}', ['userId'=>Auth::user(), 'name' => $validated["unitName"]]);
                return redirect(route("admin"))->with("msg", "Rang wurde erstellt");
            }
            Log::notice('Failed to create unit {name} by {id}', ['userId' => Auth::user(), 'name' => $validated["unitName"]]);
            return redirect(route("admin"))->with("error","Erstellung der Unit fehlgeschlagen");

        }

        if ($formType == "entryType"){
            $validated = $request->validate([
                "entryName" => "required",
                "color" => "required"
            ]);
            $validated["createdFromUser"] = Auth::id();

            if (EntryType::create($validated)){
                Log::info('User {userId} created entry type {name}', ['userId'=>Auth::user(), 'name' => $validated["entryName"]]);
                return redirect(route("admin"))->with("msg", "Eintragtyp wurde erstellt");
            }
            Log::notice('Failed to create entry type {name} by {id}', ['userId' => Auth::user(), 'name' => $validated["entryName"]]);
            return redirect(route("admin"))->with("error","Erstellung des Eintragtyps fehlgeschlagen");

        }

        if ($formType == "personal"){
            $validated = $request->validate([
                "name" => "required",
                "rankId" => "required",
                "unitId" => "required",
                "isStab" => "boolean"
            ]);

            $validated["createdFromUser"] = Auth::id();
            $validated["isStab"] = $request->has('isStab');
            dump($validated);
            if (Files::create($validated)){
                Log::info('User {userId} created member {name}', ['userId'=>Auth::user(), 'name' => $validated["name"]]);
                return redirect(route("admin"))->with("msg", "Mitglied wurde erstellt");
            }
            Log::notice('Failed to create Member {name} by {id}', ['userId' => Auth::user(), 'name' => $validated["name"]]);
            return redirect(route("admin"))->with("error","Erstellung des Mitglied fehlgeschlagen");

        }


    }
}
