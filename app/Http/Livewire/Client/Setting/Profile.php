<?php

namespace App\Http\Livewire\Client\Setting;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;

    public $account = [];
    protected $listeners = ['call_mount' => 'mount'];
    public $current_password;
    public $password;
    public $password_confirmation;

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

        User::where('id', Auth::user()->id)->update([...$this->updatedData(), 'profile_photo_path' => 'profile-photos/'.$photo_origin ?? $this->account['profile_photo_path']]);
        $this->emit('call_mount');
        $this->emit('cart_updated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => '???? c???p nh???t t??i kho???n']);
    }

    public function updatePassword()
    {
        $user = User::find(Auth::user()->id);
        $this->validate([
            'password' => 'required',
            'current_password' => 'required',
            'password_confirmation' => 'required |confirmed',
        ]);

        if (Hash::check($this->current_password, Auth::user()->password) && $this->password == $this->password_confirmation) {
            $user->update(['password' => $this->password]);
        }

        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => '???? c???p nh???t t??i kho???n']);
    }

    protected $rules = [
        'name' =>  'required',
        'email' =>  'required',
        'phone_number' =>   'required',
        'address' =>  'required',
    ];

    protected $messages = [
        'fillable.name.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'fillable.email.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'fillable.email.email' => ':attribute ch??a ????ng ?????nh d???ng',
        'fillable.phone.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'fillable.phone.digits' => ':attribute ph???i 10 s???',
        'fillable.phone.numeric' => ':attribute ph???i l?? s??? k?? t???',
        'fillable.address.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'shipRate.required' => 'Vui l??ng ch???n :attribute',
        'password.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'current_password.required' => ':attribute kh??ng ???????c ????? tr???ng',
        'password_confirmation.required' => ':attribute kh??ng ???????c ????? tr???ng',
    ];

    protected $validationAttributes = [
        'email' => '?????a ch??? email',
        'name' => 'T??n ng?????i d??ng',
        'phone' => 'S??? ??i???n tho???i',
        'address' => '?????a ch???',
        'password' => 'M???t kh???u',
        'current_password' => 'M???t kh???u hi???n t???i',
        'password_confirmation' => 'X??c nh???n m???t kh???u',
    ];
}
