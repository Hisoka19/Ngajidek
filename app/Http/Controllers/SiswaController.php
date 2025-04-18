<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;


class SiswaController extends Controller
{
public function index()
{
    $user = auth()->user()->load(['courses.zoomMeetings' => function ($query) {
        $query->where('start_time', '>=', Carbon::now())
              ->where('start_time', '<=', Carbon::now()->addMonth());
    }]);

    return view('user.dashboard', compact('user'));
}
}
