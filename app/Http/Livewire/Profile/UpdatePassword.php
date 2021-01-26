<?php

namespace App\Http\Livewire\Profile;

use App\Rules\PasswordChangeRules;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UpdatePassword extends Component
{
    public $userProfile; //render User model

    public $current_password;
    public $password;
    public $password_confirmation;
    public $userId;

    public function updated()
    {
        $this->validate([
            'current_password' => ['bail','required', 'string', new PasswordChangeRules],
            // 'password' => ['bail','required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function mount($userProfile)
    {
        $this->userId = $userProfile->id;
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['bail', 'required', 'string', new PasswordChangeRules],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($this->userId) {
            
            $this->userProfile->update([
                'password' => Hash::make($this->password),
            ]);

            session()->flash('message', 'password successfully updated.');
            
            $this->reset();
        }

    }

    public function render()
    {
        return view('livewire.profile.update-password');
    }
}
