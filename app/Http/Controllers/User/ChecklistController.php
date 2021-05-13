<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        //dd($checklist);
        return view('user.checklist.show',compact('checklist'));
    }
}
