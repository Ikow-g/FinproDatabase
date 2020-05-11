<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $char = Character::get();
        // dd($char);
        return view('character.index', compact('char'));
    }
}
