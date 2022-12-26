<?php

namespace App\Http\Livewire\Dashboard\Group;

use Livewire\Component;
use App\Models\Group;
use App\Models\Permission;

class Store extends Component
{
    public $open = false;

    public $maxWidth = '3xl';

    public $name;

    public $permission = [];

    protected $listeners = ['showStoreGroupModal' => 'show'];

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:30|unique:groups,name',
            'permission' => '',
        ];
    }

    protected $messages = [
        'name.required' => ':attribute không được bỏ trống',
        'name.min' => ':attribute trên 3 kí tự',
        'name.max' => ':attribute quá dài, tối đa 30 kí tự',
        'name.unique' => ':attribute đã tồn tại',
    ];

    protected $validationAttributes = [
        'name' => 'Tên nhóm',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(Group $group)
    {

        // dd($this->permission);
        $validatedData = $this->validate();
        $groups = Group::create($validatedData);

        if (!empty($this->permission)){
            $permissionId = Permission::whereIn('id', $this->permission)->pluck('id');
            $groups->permissions()->attach($permissionId);
        }
        $this->reset();
        $this->open = false;
        $this->emitTo('dashboard.group.index', 'resetPage');
    }

    public function show(){
        $this->reset();
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.dashboard.group.store', [
            'list_permission' => Permission::all()->pluck('name','id'),

        ]);
    }
}
