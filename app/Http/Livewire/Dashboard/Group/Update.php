<?php

namespace App\Http\Livewire\Dashboard\Group;

use Livewire\Component;
use App\Models\Group;
use App\Models\Permission;

class Update extends Component
{
    public $open = false;

    public $maxWidth = '3xl';

    public $modelId;

    public $name;

    public $permission = [];

    protected $listeners = ['showUpdateGroupModal' => 'show'];

    protected function rules()
    {
        return [
            'name'=>['required','min:3','max:30','unique:groups,name,'.$this->modelId],
            'permission' => '',
        ];
    }

    public function submit(){
        if ($this->validate()){
            $data = [
                'name'  => $this->name,
            ];
           $group = Group::where('id', $this->modelId)->update($data);

            if (!empty($this->permission)){
                $permissionId = Permission::whereIn('id', $this->permission)->pluck('id');
                Group::find($this->modelId)->permissions()->sync($permissionId);
            }
        }
        $this->reset();
        $this->open = false;
        $this->emitTo('dashboard.group.index', 'resetPage');
    }

    public function show(Group $group){
        $this->reset();
        $this->modelId = $group->id;
        $model = Group::find($this->modelId);
        $this->name         = $model->name;
        $this->permission        = $model->permissions->pluck('id');
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.dashboard.group.update',[
            'list_permission' => Permission::all()->pluck('name','id')
        ]);
    }
}
