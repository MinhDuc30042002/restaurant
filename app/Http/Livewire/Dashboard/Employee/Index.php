<?php

namespace App\Http\Livewire\Dashboard\Employee;

use App\Exports\EmployeeExport;
use App\Models\User;
use App\Models\Group;
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

    public $filteredGroup;

    public $showMore = 10;

    protected $listeners = ['resetPage' => 'resetPage'];

    public function buttonShowMore(){
        $this->showMore = $this->showMore + 5;
    }

    public function resetAll(){
        $this->reset();
    }

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
        $users = User::with('groups')->where(function ($query) {
            $query->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
        });
        if ($this->filteredRole) {
            $users = $users->with('groups')->where($this->filteredRole, '=', true);
            // $this->reset(['filteredRole', 'filteredGroup']);
        }
        if($this->filteredGroup){
            $users = $users->whereHas('groups', function ($query) {
                return $query->whereIn('group_id', [$this->filteredGroup]);
            });
            $this->reset(['filteredRole', 'filteredGroup']);
        }
        return $users->paginate($this->showMore);
    }

    public function render()
    {
        $employeesCount = User::count();
        $staffsCount = User::where('is_staff', true)->count();
        $managersCount = User::where('is_manager', true)->count();
        $list_group = Group::all();
        return view('livewire.dashboard.employee.index', [
            'list_group' => $list_group,
            'employees' => $this->getEmployees(),
            'employeesCount' => $employeesCount,
            'staffsCount' => $staffsCount,
            'managersCount' => $managersCount,
        ]);
    }
}
