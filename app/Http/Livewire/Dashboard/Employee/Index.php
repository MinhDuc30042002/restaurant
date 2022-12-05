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

    public $filteredRole;

    protected $listeners = ['resetPage' => 'resetPage'];

    // public function updatedSelectPageRows($value)
    // {
    //     if ($value) {
    //         $this->selectedRows = User::pluck('id')->map(function ($id) {
    //             return (string) $id;
    //         });
    //     } else {
    //         $this->reset(['selectedRows', 'selectPageRows']);
    //     }
    // }

    public function deleteSelectedRows()
    {
        User::whereIn('id', $this->selectedRows)->delete();

        //message delete
        // $this->dispatchBrowserEvent('deleted', ['message' => 'All Delete']);

        $this->reset(['selectedRows', 'selectPageRows']);
        $this->resetPage();
    }

    public function exportIsRoleToExcel($filteredRole = null)
    {
        $this->filteredRole = $filteredRole;

        return (new EmployeeExport($this->filteredRole))->download('employees.xlsx');
    }

    protected function getEmployees()
    {
        $users = User::where(function ($query) {
            $query->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
        });
        if ($this->filteredRole) {
            $users = $users->where($this->filteredRole, '=', true);
        }

        return $users->paginate(10);
    }

    public function render()
    {
        $employeesCount = User::count();
        $staffsCount = User::where('is_staff', true)->count();
        $managersCount = User::where('is_manager', true)->count();

        return view('livewire.dashboard.employee.index', [
            'employees' => $this->getEmployees(),
            'employeesCount' => $employeesCount,
            'staffsCount' => $staffsCount,
            'managersCount' => $managersCount,
        ]);
    }
}
