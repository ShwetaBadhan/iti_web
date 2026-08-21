<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order', 'asc')->get();
        return view('backend.pages.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $validated['order'] = $request->order ?? (Faq::max('order') + 1);
        Faq::create($validated);

        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully!');
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $faq->update($validated);
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully!');
    }

    public function toggleStatus(Faq $faq)
    {
        $faq->update(['status' => !$faq->status]);
        return redirect()->route('faqs.index')->with('success', 'Status updated successfully!');
    }
}