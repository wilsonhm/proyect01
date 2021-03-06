<div class="mt-5">
    @can('user_edit')
 
     <form wire:submit.prevent="Update()" action="" method="POST">
          <x-input.label title="Name">
             <x-input.text type="text" wire:model.defer="user.name"/>
             <x-error error-title="name" />
          </x-input.label>
  
          <x-input.label title="Email">
             <x-input.text type="email" wire:model.defer="user.email"/>
             <x-error error-title="email" />
          </x-input.label>
  
          @foreach ($roles as $role)
             <x-input.checkbox_label wire:model='selected' value="{{$role->id}}">
                {{$role->title}}
             </x-input.checkbox_label>
          @endforeach
          <x-form.submit title="Update User Details" />
     </form>
           
    @endcan
  </div>