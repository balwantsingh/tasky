<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $profile_path;
    public $mobile_number;
    public $userId;
    
    public $iteration;
    
    public $userProfile; // rendering variable

    public function mount($userProfile)
    {
        $this->name = $userProfile->name;
        $this->email = $userProfile->email;
        $this->userId = $userProfile->id; 
    }

    public function updateProfile()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->userProfile->id)],
            'profile_path' => ['nullable', 'image', 'max:1024'],
        ]);

        if ($this->userId) {

            if ($this->profile_path) {
                $validatedData['profile_path'] =  $this->profile_path->storePublicly('auth_profile','public');;
            }
            $this->userProfile->update($validatedData);

            session()->flash('message', 'User data successfully updated.');
        }
    }

    public function render()
    {
        return view('livewire.profile.update-profile');
    }
}
