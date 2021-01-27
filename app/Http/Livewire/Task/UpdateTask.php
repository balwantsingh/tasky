<?php

namespace App\Http\Livewire\Task;

use App\Models\User;
use Livewire\Component;
use App\Models\Deadline;
use App\Models\Department;
use App\Models\Task;

class UpdateTask extends Component
{
    public $task;
    
    public $department_id;
    public $updatetitle;
    public $message;
    public $assign_to;
    public $deadline_id;

    public $wantsToUpdateTask;

    public $departments; //Dept Model
    public $users = []; //User Model for loop 
    public $deadlines; //Deadline Model

    protected $listeners = ['upLive' => 'editTask'];
    // public function mount($task)
    // {
    //     //
    // }

    public function editTask()
    {
        $this->wantsToUpdateTask = true;
        $editData = Task::findOrFail($this->task->id);
        
        $this->department_id = $editData->department_id;
        $this->updatetitle = $editData->name;
        $this->message = $editData->message;
        $this->assign_to = $editData->assign_to;
        $this->deadline_id = $editData->deadline_id;
        $this->emit('livewireDashboard');
    }

    public function updateTask()
    {
        $this->validate([
            'updatetitle' => ['required','string','max:55'],
            'message' => ['required','string','max:255'],
            'department_id' => ['required','not_in:0'],
            'assign_to' => ['required','not_in:0'],
            'deadline_id' => ['required','not_in:0'],
        ]);

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
        return view('livewire.task.update-task');
    }
}
