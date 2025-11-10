<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use App\Rules\RealEmailDomain;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:newsletter_subscriptions,email', new RealEmailDomain()],
            'accept_privacy' => 'required|accepted',
        ]);

        NewsletterSubscription::create([
            'email' => $request->email,
            'is_active' => true,
        ]);

        return back()->with('success', 'Vielen Dank für deine Anmeldung! Du erhältst ab jetzt Updates zu Events in Grenchen.');
    }
}
