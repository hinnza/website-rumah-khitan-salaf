<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::latest()->get(); 
        return view('dashboard.suggestions.index', compact('suggestions'));
    }

    public function update(Request $request, $id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->update([
            'is_visible' => $request->has('is_visible'), 
            'admin_reply' => $request->admin_reply
        ]);
        return redirect()->back()->with('success', 'Status saran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();
        return redirect()->back()->with('success', 'Saran berhasil dihapus.');
    }
}