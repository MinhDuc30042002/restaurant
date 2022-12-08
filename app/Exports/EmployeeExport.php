<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class EmployeeExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    public $selectedRows;

    public $role;

    public $isRole;

    public function __construct($isRole)
    {
        $this->isRole = $isRole;
    }

    public function map($user): array
    {
        if ($user->is_staff) {
            $this->role = 'Nhân viên';
        } else {
            $this->role = 'Quản lý';
        }

        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone,
            $this->role,
            Date::dateTimeToExcel($user->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Họ tên',
            'Email',
            'Số điện thoại',
            'Vai trò',
            'Ngày tham gia',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function query()
    {
        if ($this->isRole == null) {
            return User::where('is_staff', true)->orWhere('is_manager', true)->orderBy('is_manager', 'DESC');
        }

        return User::where($this->isRole, true);
    }
}
