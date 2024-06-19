<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\User\UserResourse;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class ShowUserController extends Controller
{
    public function snowOnePerson($id)
    {
        $user = User::find($id);
        $data = new UserResourse($user);

        return $data;
    }
}
