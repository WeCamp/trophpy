<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function view(User $user): View
    {

        return view('users.view')->with([
            'user' => $user->toArray(),
            'currentChallenges' => $user->currentChallenges->toArray(),
            'completedChallenges' => $user->completedChallenges->toArray(),
        ]);
    }

    public function update(Request $request,User $user)
    {
        $this->validate($request, [
            'name' => 'string',
        ]);

        $update = $request->except('avatar');

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $update['avatar_filename'] = md5($user->username.$avatar->getClientOriginalName());
            $avatar->move(public_path().'/img/avatars',$update['avatar_filename']);
        }


        $user->update($update);

        return redirect(route('users.view', $user->username));
    }
}
