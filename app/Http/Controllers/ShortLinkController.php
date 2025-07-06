<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\ShortLinkClick;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = ShortLink::where('user_id', Auth::id())->latest()->get();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403, 'Вы должны быть авторизованы для создания ссылки.');
        }
        $request->validate([
            'original_url' => 'required|url|max:2048',
        ]);

        do {
            $short_code = Str::random(6);
        } while (ShortLink::where('short_code', $short_code)->exists());

        $link = ShortLink::create([
            'user_id' => Auth::id(),
            'original_url' => $request->original_url,
            'short_code' => $short_code,
        ]);

        return redirect()->route('links.index')->with('success', 'Короткая ссылка создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortLink $link)
    {
        /* if ((int)$shortLink->user_id !== (int)Auth::id()) {
            abort(403);
        } */
        $clicks = $link->clicks()->latest()->get();
        return view('links.show', compact('link', 'clicks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortLink $shortLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortLink $shortLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortLink $link)
   {
       $link->delete();
       return redirect()->route('links.index')->with('success', 'Ссылка удалена!');
   }

    /**
     * Redirect by short code and log click.
     */
    public function redirect($short_code, Request $request)
    {
        $link = ShortLink::where('short_code', $short_code)->firstOrFail();
        ShortLinkClick::create([
            'short_link_id' => $link->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        return redirect($link->original_url);
    }
}
