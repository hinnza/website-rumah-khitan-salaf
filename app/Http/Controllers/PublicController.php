<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion; 

class PublicController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::where('is_visible', true)->latest()->get();
        return view('welcome', compact('suggestions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);
        Suggestion::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success', 'Terima kasih! Saran Anda telah kami terima.');
    }
}