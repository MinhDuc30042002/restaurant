<?php

namespace App\Http\Livewire\Dashboard\Employee;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
class Index extends Component
{
    use WithPagination;
    public $selectedRows = array();
    public $selectPageRows = false;
    public $isRole = null;
    public $name, $email, $is_staff = 0, $is_manager = 0;
    public $modalConfirmDeleteVisible;
    public $modalUpdateFormVisible;
    public $modalCreateFormVisible;
    public $modelId;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'username' => 'required|min:6|max:255|alpha_dash|unique:users,username,' . $this->user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'
        ];
    }

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];

    public function modelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'is_staff' => $this->is_staff,
            'is_manager' => $this->is_manager,
        ];
    }

    public function update()
    {
        User::find($this->modelId)->update($this->modelData());
        $this->modalUpdateFormVisible = false;
        $this->reset();
    }

    public function loadModel()
    {
        $user = User::find($this->modelId);
        $this->name = $user->name ;
        $this->email = $user->email;
    }

    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->modalUpdateFormVisible = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function create(){
        $this->validate();
        User::create($this->modelData());
        $this->modalCreateFormVisible = false;
        $this->reset();
    }

    public function showCreateModal()
    {
        $this->reset();
        $this->modalCreateFormVisible = true;
    }

    public function filterUserByRole($isRole = null)
    {
        $this->resetPage();
        $this->isRole = $isRole;
    }

    public function resetPage(){
        $this->reset();
    }

    public function updatedSelectPageRows($value)
    {
        if($value){
            $this->selectedRows = $this->user->pluck('id')->map(function ($id){
                return (string) $id;
            });
        }else{
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getUserProperty()
    {
        if(isset($this->isRole)){
            return  User::when($this->isRole, function ($query, $isRole){
                        return $query->where($isRole, true);
                    })->paginate(10);
        }

        return  User::where('is_staff', true)->orWhere('is_manager', true)->paginate(10);
    }

    public function deleteSelectedRows()
    {
        User::whereIn('id', $this->selectedRows)->delete();

        #message delete
        // $this->dispatchBrowserEvent('deleted', ['message' => 'All Delete']);

        $this->reset(['selectedRows', 'selectPageRows']);
        $this->resetPage();
    }

    public function exportIsRoleToExcel($isRole = null)
    {
        $this->isRole = $isRole;
        return (new EmployeeExport($this->isRole))->download('employees.xlsx');
    }

    public function render()
    {
        $user = $this->user;
        $userCount = User::where('is_staff', true)->orWhere('is_manager', true)->count();
        $isStaffCount = User::where('is_staff', true)->count();
        $isManagerCount = User::where('is_manager', true)->count();
        return view('livewire.dashboard.employee.index', [
            'user' => $user,
            'userCount' => $userCount,
            'isStaffCount' => $isStaffCount,
            'isManagerCount' => $isManagerCount,
        ]);
    }
}
