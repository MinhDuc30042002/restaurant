<?php

namespace App\Http\Livewire\Dashboard\Employee;

use App\Exports\EmployeeExport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $selectedRows = [];

    public $selectPageRows = false;

    public $searchTerm = '';

    public $isRole = null;

    public $name;

    public $email;

    public $is_staff = 0;

    public $is_manager = 0;

    public $modalConfirmDeleteVisible;

    public $modalUpdateFormVisible;

    public $modelId;

    public function modelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'is_staff' => $this->is_staff,
            'is_manager' => $this->is_manager,
        ];
    }

    public function loadModel()
    {
        $user = User::find($this->modelId);
        $this->name = $user->name;
        $this->email = $user->email;
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

    public function filterUserByRole($isRole = null)
    {
        $this->resetPage();
        $this->isRole = $isRole;
    }

    public function resetPage()
    {
        $this->reset();
    }

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->user->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getUserProperty()
    {
        if (isset($this->isRole)) {
            return  User::when($this->isRole, function ($query, $isRole) {
                return $query->where($isRole, true);
            })->paginate(10);
        }

        $users = User::where(function ($query) {
            $query->where('is_manager', true)->orWhere('is_staff', true);
        })->where(function ($query) {
            $query->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
        });

        return $users->paginate(10);
    }

    public function deleteSelectedRows()
    {
        User::whereIn('id', $this->selectedRows)->delete();

        //message delete
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
