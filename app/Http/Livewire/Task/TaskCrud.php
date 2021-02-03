<?php

namespace App\Http\Livewire\Task;

use App\Models\Deadline;
use App\Models\User;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithFileUploads;

class TaskCrud extends Component
{
    use WithFileUploads;

    public $department_id;
    public $title;
    public $message;
    public $assign_to;
    public $deadline_id;

    public $departments; //Dept Model
    public $users = []; //User Model for loop 
    public $deadlines; //Deadline Model

    public $attachments = [];
    public $iteration;

    public function storeTask()
    {
        $this->validate([
            'title' => ['required','string','max:55'],
            'message' => ['required','string','max:255'],
            'department_id' => ['required','not_in:0'],
            'assign_to' => ['required','not_in:0'],
            'deadline_id' => ['required','not_in:0'],
            'attachments.*' => ['mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx','max:1024'],
        ]);

        $task = auth()->user()->tasks()->create([
            'name' => $this->title,
            'message' => $this->message,
            'department_id' => $this->department_id,
            'deadline_id' => $this->deadline_id,
            'assign_to' => $this->assign_to,
            'status_id' => 1, //byDefault Open Task
        ]);
        
        if ($this->attachments) 
        {
            foreach ($this->attachments as $photo) {
                $path_url = $photo->storePublicly('task-documents', 'public');
                $task->documents()->create([
                    'file_name' => $photo->getClientOriginalName(),
                    'mime_type' => $photo->getMimeType(),
                    'file_path' => $path_url,
                ]);
            }
        }
        
        $this->iteration++;

        $this->dispatchBrowserEvent('closeModal',['message' => 'Task created successfully.']);
    
        session()->flash('message', 'Task created successfully.');
        $this->emit('listData');
        $this->reset();
    }
    
    public function render()
    {
        try {
            $this->departments = Department::latest()->get();
            if(!empty($this->department_id))
            {
                $this->users = User::whereHas('departments', function($query){
                    $query->where('department_id',$this->department_id);
                })->latest()->get();
            }
            $this->deadlines = Deadline::latest()->get();
        } catch (\Throwable $th) {
            $this->users = false;
        }
        return view('livewire.task.task-crud');
    }
}
