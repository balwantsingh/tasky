<?php

namespace App\Traits;

// use App\Models\Task;

// trait TaskTrait 
// {
//     public $wantsToUpdateModal;
//     public $title;
//     public $message;
//     public $editId;

//     public function editTask($id)
//     {
//         $this->wantsToUpdateModal = true;

//         $editData = Task::findOrFail($id);
//         $this->title = $editData->name; 
//         $this->message = $editData->message; 
//     }

//     public function updateDepartment()
//     {
//         $this->validate([
//             'title' => ['required','string','max:55'],
//             'message' => ['required','string','max:255'],
//             'department_id' => ['required','not_in:0'],
//             'assign_to' => ['required','not_in:0'],
//             'deadline_id' => ['required','not_in:0'],
//         ]);
//         if($this->wantsToUpdateModal)
//         {
//             $validatedData = $this->validate();

//             $findRowValue = Task::findOrFail($this->editId);
    
//             $findRowValue->update($validatedData);

//             $this->dispatchBrowserEvent('closeModal',['message' => 'Department updated successfully']);
    
//             session()->flash('message', 'Department successfully updated.');
    
//             $this->reset();
//         }
//     }

//     public function putTaskOnTrash($id)
//     {
//         Task::destroy($id);
//     } 
// }