<?php

namespace App\Http\Livewire;

use App\Models\Status as ModelsStatus;
use Livewire\Component;

class Status extends Component
{
    public $name; // table column
    public $editId; // table column

    public $status; //table collection get
    
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

    public function storeStatus()
    {
        $validatedData = $this->validate();

        ModelsStatus::create($validatedData);
        
        $this->dispatchBrowserEvent('closeModal', ['message' => 'Status added successfully']);
        
        session()->flash('message', 'Status successfully added.');
        
        $this->reset();
    }

    public function edit($id)
    {
        $this->wantsToUpdateModal = true;

        $editData = ModelsStatus::findOrFail($id);
        $this->editId = $editData->id;
        $this->name = $editData->name;
    }

    public function updateStatus()
    {
        if($this->wantsToUpdateModal)
        {
            $validatedData = $this->validate();

            $findRowValue = ModelsStatus::findOrFail($this->editId);
    
            $findRowValue->update($validatedData);

            $this->dispatchBrowserEvent('closeModal',['message' => 'Status updated successfully']);
    
            session()->flash('message', 'Status successfully updated.');
    
            $this->reset();
        }
    }

    public function putOnTrash($id)
    {
        ModelsStatus::destroy($id);
    }    
    public function render()
    {
        try {
            $this->status = ModelsStatus::latest()->get();
        } catch (\Throwable $th) {
            $this->status = false;
        }
        return view('livewire.status');
    }
}
