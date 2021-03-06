<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Admin\Role;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class ViewRoles extends Component
{
    use WithPagination;
    public $selected= [];
    public $deleted_record;
    public function mount()
    {
        if(Gate::denies('role_read')){
            return redirect()->route('dashboard');
        }
    }
    public function Delete($id)
    {
        if(Gate::denies('role_delete')){
            return redirect()->route('dashboard');
        }else{
            $role = Role::find($id);
            $this->deleted_record = $role->title;
            $role->delete();
            $this->emitSelf('record_deleted');
        }
       
    }
    public function DeleteSelected()
    {
        if(Gate::denies('role_delete')){
            return redirect()->route('dashboard');
        }else{
            Role::destroy($this->selected);
            $this->deleted_record = "Selected Roles";
            $this->emitSelf('record_deleted');
            $this->selected = [];
        }
    }
    public function render()
    {
        return view('livewire.admin.roles.view-roles',[
            'roles'=>Role::with(['permissions'])->orderBy('title','DESC')
                    ->paginate(50),
        ])->extends('layouts.admin');
    }
}
