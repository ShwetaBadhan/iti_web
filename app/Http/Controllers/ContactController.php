<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'course'  => 'required|string',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            ContactInquiry::create($validated);
            
            // This redirect is crucial. It tells the browser to reload the page 
            // and carry the 'success' message in the session.
            return redirect()->back()->with('success', 'Thank you! Your request has been submitted successfully. We will contact you shortly.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}