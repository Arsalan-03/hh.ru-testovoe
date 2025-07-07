<?php

namespace App\Http\Services;

use App\Http\Interfaces\ShortLinkInterface;
use App\Models\ShortLink;
use App\Models\ShortLinkClick;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortLinkService implements ShortLinkInterface
{
    public function create($request)
    {
        do {
            $short_code = Str::random(6);
        } while (ShortLink::where('short_code', $short_code)->exists());

        $link = ShortLink::create([
            'user_id' => Auth::id(),
            'original_url' => $request->original_url,
            'short_code' => $short_code,
        ]);

        return true;
    }

    public function destroy($link)
    {
        $link->delete();
        return true;
    }

    public function redirect($shortCode, $request)
    {
        $link = ShortLink::where('short_code', $shortCode)->firstOrFail();
        ShortLinkClick::create([
            'short_link_id' => $link->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($link->original_url);
    }
}
