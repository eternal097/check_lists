<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
      {
          $this->middleware(['role:admin|super-admin']);
      }

      /**
       * Show the application dashboard.
       *
       * @return \Illuminate\Contracts\Support\Renderable
       */
      public function show()
      {
          $user = User::find(Auth::id());
          $roles = $user->getRoleNames();

          return view('adminpanel', compact('roles'));
      }

      public function showUserslist()
      {
          $users = User::role(['user', 'blocked'])->get();

          return view('userslist', compact('users'));
      }

      public function userUpdate(Request $request, $id)
      {
        $user = User::find($id);

        $user->max_checklist = $request->max_checklist;
        $user->save();

        return back();
      }

}
