<?php

namespace App\Http\Livewire\Client\Contact;

use Livewire\Component;
use App\Mail\ClientContact;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    public $fullname;

    public $phone;

    public $email;

    public $message;

    public $subject;

    public function submit()
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ClientContact($this->fullname, $this->phone, $this->message, $this->email, $this->subject));
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Gửi phản hồi thành công']);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.client.contact.index');
    }
}
