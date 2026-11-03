<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Process qualifying chat inquiry & format WhatsApp redirect URL
     */
    public function handleLead(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'intent' => 'required|string|max:200',
            'notes' => 'nullable|string|max:1000',
        ]);

        $visitorName = $validated['name'];
        $company = $validated['company'] ?: 'Individual / Enterprise';
        $intent = $validated['intent'];
        $notes = $validated['notes'] ? "\n\n*Project Specifications / Notes:* " . $validated['notes'] : '';

        $message = "Hello Seiko Denki Sales & Engineering Team,\n\n"
                 . "My name is *{$visitorName}* from *{$company}*.\n"
                 . "I am inquiring regarding: *{$intent}*."
                 . $notes . "\n\n"
                 . "Looking forward to your advice and quotation.";

        $phone = config('app.whatsapp_number', '60123548282');
        $encoded = urlencode($message);
        $whatsappUrl = "https://wa.me/{$phone}?text={$encoded}";

        return response()->json([
            'success' => true,
            'whatsapp_url' => $whatsappUrl,
            'formatted_message' => $message,
        ]);
    }
}
