<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use App\Models\Deadline;
use App\Models\Department;

class Kanban extends Component
{
    public $taskKanban;

    public $department_id;
    public $title;
    public $message;
    public $assign_to;
    public $deadline_id;

    public $wantsToUpdateTask;
    public $wantsToViewTask;
    public $taskView;
    public $taskId;

    public $departments; //Dept Model
    public $users = []; //User Model for loop 
    public $deadlines; //Deadline Model

    public $listeners = ['closeButton', 'listData' => 'render'];

    public function editTask($id)
    {
        $this->wantsToUpdateTask = true;
        $editData = Task::findOrFail($id);
        $this->department_id = $editData->department_id;
        $this->title = $editData->name;
        $this->message = $editData->message;
        $this->assign_to = $editData->assign_to;
        $this->deadline_id = $editData->deadline_id;
        $this->taskId = $editData->id;
    }

    public function updateTask()
    {
        $this->validate([
            'title' => ['required','string','max:55'],
            'message' => ['required','string','max:255'],
            'department_id' => ['required','not_in:0'],
            'assign_to' => ['required','not_in:0'],
            'deadline_id' => ['required','not_in:0'],
        ]);
        
        if ($this->taskId) {
            $findRowValue = Task::findOrFail($this->taskId);

            $findRowValue->update([
                'name' => $this->title,
                'message' => $this->message,
                'department_id' => $this->department_id,
                'deadline_id' => $this->deadline_id,
                'assign_to' => $this->assign_to,
            ]);
    
            $this->dispatchBrowserEvent('closeModal',['message' => 'Task updated successfully.']);
        
            session()->flash('message', 'Task updated successfully.');
            $this->reset();
        }
    }

    public function putTaskOnTrash($id)
    {
        Task::destroy($id);
        session()->flash('message', 'Task-'.$id.' deleted successfully.');
    }

    public function viewTask($id)
    {
        $this->wantsToViewTask = true;

        $this->taskView = Task::findOrFail($id);
    }

    public function closeButton()
    {
        $this->reset();
    }

    // public function updateGroupOrder()
    // {
    //     // ray()->clearAll();
    //     ray('group order'); 
    // }

    public function updateTaskOrder($orderIds)
    {
        dd($orderIds);
        ray($orderIds);
    }

    public function render()
    {
        ray()->clearAll();
        $this->departments = Department::latest()->get();
        if(!empty($this->department_id))
        {
            $this->users = User::whereHas('departments', function($query){
                $query->where('department_id',$this->department_id);
            })->latest()->get();
        }
        $this->deadlines = Deadline::latest()->get();
        
        foreach (auth()->user()->getRoleNames() as $role) {
            $roleName = $role;
        }
        if ($roleName === 'admin') {
            
            $this->taskKanban = Status::with(['tasks' => function($q){
                $q->isActive()->latest();
            }])->get();
            
            
        } else {
            $this->taskKanban = Status::with(['tasks' => function($q){
                return $q->where('assign_to', auth()->user()->id)->isActive()->latest();
            }])->get();
        }
        return view('livewire.dashboard.kanban');
    }
}
