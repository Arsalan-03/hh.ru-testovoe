<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Http\Services\ShortLinkService;
use App\Models\ShortLink;
use App\Models\ShortLinkClick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortLinkController extends Controller
{
    private ShortLinkService $shortLinkService;
    public function __construct()
    {
        $this->shortLinkService = new ShortLinkService();
    }

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
    public function store(ShortLinkRequest $request)
    {
        $this->shortLinkService->create($request);

        return redirect()->route('links.index')->with('success', 'Короткая ссылка создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortLink $link)
    {
        $clicks = $link->clicks()->latest()->get();
        return view('links.show', compact('link', 'clicks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortLink $link)
   {
       $this->shortLinkService->destroy($link);
       return redirect()->route('links.index')->with('success', 'Ссылка удалена!');
   }

    /**
     * Redirect by short code and log click.
     */
    public function redirect($shortCode, Request $request)
    {
        return $this->shortLinkService->redirect($shortCode, $request);
    }
}
