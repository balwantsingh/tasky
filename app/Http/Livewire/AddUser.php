<?php

namespace App\Http\Livewire;

use App\Mail\UserCreated;
use App\Models\User;
use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddUser extends Component
{
    public $name; // table column
    public $email; // table column
    public $profile_path;
    public $editId; // table column
    
    public $department_id;

    public $users; //table collection get
    public $departments; //table collection get
    
    public $wantsToUpdateModal; //wants to update modal
    
    protected $listeners = ['clearPreviousInputValue'];

    protected $rules = [
        'name' => 'required|string|max:25',
        'department_id' => 'required|not_in:0',
        'email' => 'required|string|email|max:255|unique:users',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearPreviousInputValue()
    {
        $this->reset(); 
    }

    // public function departmentsLoads()
    // {
    //     $this->departments = Department::latest()->get();
    // }

    public function createUser()
    {
        $validatedData = $this->validate() + [
            'password' => Hash::make('Pa$$word@321'),
        ];

        $user = User::create($validatedData);

        $user->departments()->attach($this->department_id);
        
        Mail::to($this->email)->send(new UserCreated($user));
        
        $this->dispatchBrowserEvent('closeModal', ['message' => 'User added successfully']);
        
        session()->flash('message', 'User successfully added.');
        
        $this->reset();
    }

    public function edit($id)
    {
        $this->wantsToUpdateModal = true;

        $editData = User::findOrFail($id);
        $this->editId = $editData->id;
        $this->name = $editData->name;
        $this->email = $editData->email;

        foreach($editData->departments as $dept){
            $this->department_id = $dept->pivot->department_id;
        }
    }

    public function updateUser()
    {
        if($this->wantsToUpdateModal)
        {
            $validatedData = $this->validate([
                'name' => 'required|string|max:25',
                'department_id' => 'required|not_in:0',
            ]);

            $findRowValue = User::findOrFail($this->editId);
    
            $findRowValue->update($validatedData);

            $findRowValue->departments()->sync([$this->department_id]);

            $this->dispatchBrowserEvent('closeModal',['message' => 'User updated successfully']);
    
            session()->flash('message', 'User successfully updated.');
    
            $this->reset();
        }
    }

    public function putOnTrash($id)
    {
        User::destroy($id);
    }    
    public function render()
    {
        try {
            $this->users = User::where('id','!=',1)->latest()->get();
            $this->departments = Department::latest()->get();
        } catch (\Throwable $th) {
            $this->users = false;
        }
        return view('livewire.add-user');
    }
}
