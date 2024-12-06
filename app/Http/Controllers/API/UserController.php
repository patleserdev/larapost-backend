<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $users = User::all();
         
        // $users = User::with('roles')->get();

        // On retourne les informations des utilisateurs en JSON
        // return response()->json($users, 200);
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        // création
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $role = Role::find(2);
        $user->roles()->attach($role->id);

        // Log::info('This is some useful information.');

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // $user->load('roles'); // Charger la relation 'roles'

        // return response()->json($user);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Log::debug($request);
        if ($request->isMethod('put')) 
        {

            $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),         
            ]);

            if(!$user->hasRoleId($request->role))
            {
                
                $user->roles()->attach($request->role);
            }
        } 
        elseif ($request->isMethod('patch')) 
        {

            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:users,email,' . $user,
                'password' => 'sometimes|min:8',
                'role' => 'sometimes',
            ]);
            $data = array_filter($validated);
            if (isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }
              
                if (isset($data['role'])) 
                {
                    if(is_array($data['role']))
                    {
                        foreach($data['role'] as $value)
                        {
                            // Log::debug($value);
                            if(!$user->hasRoleId($value))
                            {
                                
                                $user->roles()->attach($value);
                            }
                        }

                    }
                    else
                    {
                        if(!$user->hasRoleId($data['role']))
                        {
                            
                            $user->roles()->attach($data['role']);
                        }
                    }
                    
                }
    

            $user->update($data);
        }

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }
}
