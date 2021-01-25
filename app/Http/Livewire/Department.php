<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department as AddDepartment;

class Department extends Component
{
    public $name; // table column
    public $editId; // table column

    public $departments; //table collection get
    
    public $wantsToUpdateModal; //wants to update modal
    
    protected $listeners = ['clearPreviousInputValue'];

    protected $rules = [
        'name' => 'required|string|max:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearPreviousInputValue()
    {
        $this->reset(); 
    }

    public function storeDepartment()
    {
        $validatedData = $this->validate();

        AddDepartment::create($validatedData);
        
        $this->dispatchBrowserEvent('closeModal', ['message' => 'Department added successfully']);
        
        session()->flash('message', 'Department successfully added.');
        
        $this->reset();
    }

    public function edit($id)
    {
        $this->wantsToUpdateModal = true;

        $editData = AddDepartment::findOrFail($id);
        $this->editId = $editData->id;
        $this->name = $editData->name;
    }

    public function updateDepartment()
    {
        if($this->wantsToUpdateModal)
        {
            $validatedData = $this->validate();

            $findRowValue = AddDepartment::findOrFail($this->editId);
    
            $findRowValue->update($validatedData);

            $this->dispatchBrowserEvent('closeModal',['message' => 'Department updated successfully']);
    
            session()->flash('message', 'Department successfully updated.');
    
            $this->reset();
        }
    }

    public function putOnTrash($id)
    {
        AddDepartment::destroy($id);
    }    

    public function render()
    {
        try {
            $this->departments = AddDepartment::latest()->get();
        } catch (\Throwable $th) {
            $this->departments = false;
        }
        return view('livewire.department');
    }
}
