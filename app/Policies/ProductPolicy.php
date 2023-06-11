<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Product;

class ProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Product $Product)
    {
        //
    }


    public function create(User $user)
    {
        // $user = auth()->user();

        // if($user->isAdmin()  || $user->isEditor()){
        //     return true;
        // }else{
        //     return false;
        // }
        // if($user->role_id == 1 || $user->role_id == 2){
        //     return true;
        // }else{
        //     return false;
        // }
        if(User::isAdmin()){
            return true;
        }else{
            return false;
        }

    }


    public function edit()
    {
        // $user = auth()->user();
        if(User::isAdmin() || User::isEditor()){
            return true;
        }else{
            return false;
        }
    }


    public function delete()
    {
        // $user = auth()->user();
        if(User::isAdmin()){
            return true;
        }else{
            return false;
        }
    }


    public function restore(User $user, Product $Product)
    {
        //
    }


    public function forceDelete(User $user, Product $Product)
    {
        //
    }
}
