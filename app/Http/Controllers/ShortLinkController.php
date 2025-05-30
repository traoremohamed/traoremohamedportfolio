<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    // Générer une URL courte
    public function createShortLink($longUrl) {
        $existing = ShortLink::where('long_url', $longUrl)->first();
        if ($existing) {
            return url('/s/' . $existing->code); // Retourne le lien existant
        }

        $code = substr(md5(uniqid()), 0, 6); // Génère un code unique de 6 caractères
        $shortLink = ShortLink::create([
            'code' => $code,
            'long_url' => $longUrl,
        ]);

        return url('/s/' . $shortLink->code);
    }

    // Redirection à partir du lien court
    public function redirect($code) {
        $shortLink = ShortLink::where('code', $code)->firstOrFail();
        return redirect()->to($shortLink->long_url);
    }
}
