<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Deadline;

class TaskDeadline extends Component
{
    public $name; // table column
    public $editId; // table column

    public $deadlines; //table collection get
    
    public $wantsToUpdateModal; //wants to update modal
    
    protected $rules = [
        'name' => 'required|string|max:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeDeadline()
    {
        $validatedData = $this->validate();

        Deadline::create($validatedData);
        
        $this->dispatchBrowserEvent('closeModal', ['message' => 'Deadline added successfully']);
        
        session()->flash('message', 'Deadline successfully added.');
        
        $this->reset();
    }

    public function edit($id)
    {
        $this->wantsToUpdateModal = true;

        $editData = Deadline::findOrFail($id);
        $this->editId = $editData->id;
        $this->name = $editData->name;
    }

    public function updateDeadline()
    {
        if($this->wantsToUpdateModal)
        {
            $validatedData = $this->validate();

            $findRowValue = Deadline::findOrFail($this->editId);
    
            $findRowValue->update($validatedData);

            $this->dispatchBrowserEvent('closeModal',['message' => 'Deadline updated successfully']);
    
            session()->flash('message', 'Deadline successfully updated.');
    
            $this->reset();
        }
    }

    public function putOnTrash($id)
    {
        Deadline::destroy($id);
    }

    public function render()
    {
        try {
            $this->deadlines = Deadline::latest()->get();
        } catch (\Throwable $th) {
            $this->deadlines = false;
        }
        return view('livewire.task-deadline');
    }
}
