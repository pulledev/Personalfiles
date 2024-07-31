<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use App\Models\Entry;
use App\Models\EntryType;
use App\Models\Files;
use App\Models\Ranks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class FilesController extends Controller
{
    public function files()
    {
        $files = Files::with("rank","unit")->get();
        return view("files", ["files" => $files]);
    }

    public function detail($id)
    {
        $file = Files::find($id);
        $entryTypes = EntryType::all();
        $entries = Entry::where('fileId', $id)->get();
        $educations = Educations::where('fileId', $id)->get();
        return view('files.detail', compact('file', 'entries', 'entryTypes', 'educations'));
    }

    public function detailPost(Request $request, $id)
    {
        $formType = $request->input("form_type");

        if ($formType == "entry") {
            $file = Files::find($id);
            $validated = $request->validate([
                'headline' => 'required',
                'text' => 'required',
                'typeId' => 'required'
            ]);

            $validated["fileId"] = $file->id;
            $validated["createdFromUser"] = Auth::id();
            if (Entry::create($validated)) {
                Log::info('User {userId} created unit {name}', ['userId' => Auth::id(), 'name' => $validated["headline"]]);
                return redirect(route("files.detail", $file->id))->with("msg", "Einheit wurde erstellt");
            }
            Log::notice('Failed to create rank {name} by {id}', ['userId' => Auth::user(), 'name' => $validated["headline"]]);
            return redirect(route("files.detail", $file->id))->with("msg", "Eintrag der Unit fehlgeschlagen");
        }
    }
}

