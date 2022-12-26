<?php

namespace App\Http\Livewire\Client\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $account = [];
    protected $listeners = ['call_mount' => 'mount'];

    public function render()
    {
        return view('livewire.client.setting.profile');
    }

    public function mount()
    {
        $this->modeData();
    }

    public function modeData()
    {
        return [
            $this->account['name'] = Auth::user()->name,
            $this->account['email'] = Auth::user()->email,
            $this->account['profile_photo_path'] = Auth::user()->profile_photo_path,
            $this->account['phone_number'] = Auth::user()->phone_number,
            $this->account['address'] = Auth::user()->address,
        ];
    }

    public function updatedData()
    {
        return [
            'name' =>  $this->account['name'] ?? Auth::user()->name,
            'email' =>  $this->account['email'] ?? Auth::user()->email,
            'phone_number' =>   $this->account['phone_number'] ?? Auth::user()->phone_number,
            'address' =>  $this->account['address'] ?? Auth::user()->address,
        ];
    }

    public function updateProfile()
    {
        if (Auth::user()->profile_photo_path != $this->account['profile_photo_path']) {
            $this->account['profile_photo_path']->storeAs('public/profile-photos', $this->account['profile_photo_path']->getClientOriginalName());
            $photo_origin = $this->account['profile_photo_path']->getClientOriginalName();
        }

        User::where('id', Auth::user()->id)->update([...$this->updatedData(), 'profile_photo_path' => $photo_origin ?? $this->account['profile_photo_path']]);
        $this->emit('call_mount');
        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Đã cập nhật tài khoản']);
    }

    protected $rules = [
        'name' =>  'required',
        'email' =>  'required',
        'phone_number' =>   'required',
        'address' =>  'required',
    ];

    protected $messages = [
        'fillable.name.required' => ':attribute không được để trống',
        'fillable.email.required' => ':attribute không được để trống',
        'fillable.email.email' => ':attribute chưa đúng định dạng',
        'fillable.phone.required' => ':attribute không được để trống',
        'fillable.phone.digits' => ':attribute phải 10 số',
        'fillable.phone.numeric' => ':attribute phải là số ký tự',
        'fillable.address.required' => ':attribute không được để trống',
        'shipRate.required' => 'Vui lòng chọn :attribute'
    ];

    protected $validationAttributes = [
        'email' => 'Địa chỉ email',
        'name' => 'Tên người dùng',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ',
    ];
}
