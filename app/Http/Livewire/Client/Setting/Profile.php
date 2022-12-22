<?php

namespace App\Http\Livewire\Client\Setting;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $account = [];

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

    public function updateProfile()
    {
        // dd($this->account['profile_photo_path']);
    }
}
