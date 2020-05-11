<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacher;
use App\User;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = teacher::all();
        return view('teacher.index', compact('teacher'));
    }
    public function add()
    {
        return view('teacher.add_page');
    }
    public function store(request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->nickname = $request->nickname;
        $user->age = $request->age;
        $user->save();

        $data = new teacher;
        $data->user_id = $user->id;
        $data->subject = $request->subject;
        $data->class = $request->class;
        $data->payment_id = 1;
        $data->save();

        return redirect('/teacher');
    }
}
