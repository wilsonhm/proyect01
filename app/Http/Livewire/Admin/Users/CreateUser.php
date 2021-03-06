<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $selected = [];
    public $name;
    public $email;
    public $password;

    protected $rules=[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
    ];
    public function mount()
    {
        if(Gate::denies('user_create')){
            redirect()->route('dashboard');
        }
    }
    public function Add()
    {
        $this->validate();
        $user = User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'email_verified_at'=>now(),
            'password'=>Hash::make($this->password),
        ]);
        $user->roles()->sync($this->selected);
        return redirect()->route('admin.users.index');
    }
    public function render()
    {
        return view('livewire.admin.users.create-user',[
            'roles'=>Role::all(),
        ])->extends('layouts.admin');
    }
}
