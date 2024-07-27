<?php
declare(strict_types=1);


namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class IndexController
{
    public function indexAction(Request $request): View
    {
        if ($request->getMethod() === 'POST'){
            $validated = $request->validate([
                'email' => ['required', 'max:255'],
                'password' => ['required', 'max:255']
            ]);
            dump($validated);
        }
        return view('home');
    }
}
