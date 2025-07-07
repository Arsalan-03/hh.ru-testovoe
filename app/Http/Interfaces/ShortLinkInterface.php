<?php

namespace App\Http\Interfaces;

use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;

interface ShortLinkInterface
{
    public function create($request);

    public function destroy($link);

    public function redirect($shortCode, $request);
}
