<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\User;

class StudentController extends Controller
{
    public function sessions($id)
    {

        $user = User::find($id);
        $student = $user->student();
        foreach ($student->groups() as $group) {
            # code..
            $sessions = $group->sessions();
            $temp = [];
            foreach ($sessions as $session) {

                if ($session->state == 'approved') {
                    $session['teacher'] = $session->teacher();
                    array_push($temp, $session);
                }
            }
        }

        return response()->json($sessions, 200);
    }

    public function show($id)
    {
        $session = Session::find($id);
        $session['teacher'] = $session->teacher();
        $session['group'] = $session->group();
        return response()->json($session, 200);
    }
}
