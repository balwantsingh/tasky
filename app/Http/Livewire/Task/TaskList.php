<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class TaskList extends Component
{
    public $taskLists;
    public $status;

    public $tabToggleName; // This var is used for active the nav tab button
    public $countTrashedTask;

    public $roleName;

    /*
        public $recentlyAddedPost;
        protected $listeners = ['taskAdded'];
        public function taskAdded(Task $task)
        {
            $this->recentlyAddedPost = $task;
        }
    */
    public $listeners = ['listData' => 'mount'];

    /**
     * Filter Task based on status
     *
     */
    public function taskStatus($statusName = "Open") 
    {
        $this->tabToggleName = $statusName;
        if ($this->roleName === 'admin') {
            $this->taskLists = Task::query()
                ->filterTaskWithStatus($statusName)
                ->isActive()->latest()->get();
        } else {
            $this->taskLists = Task::query()
                ->filterTaskWithStatus($statusName)
                ->notAnAdminUser()->isActive()->latest()->get();
        }
    }

    public function trashTask() 
    {
        Gate::authorize('adminAccess'); //This policy is added on UserPolicy
        $this->tabToggleName = "trashed";
        $this->taskLists = Task::onlyTrashed()->get();
    }

    public function mount(Status $status)
    {
        try {
            $this->status = $status->get();

            foreach (auth()->user()->getRoleNames() as $role) {
                $this->roleName = $role;
            }
            if ($this->roleName === 'admin') {
                $this->countTrashedTask = Task::onlyTrashed()->count();
                $this->taskLists = Task::whereHas('status')->isActive()->latest()->get();
            } else {
                $this->countTrashedTask = Task::notAnAdminUser()->onlyTrashed()->count();
                $this->taskLists = Task::whereHas('status')->notAnAdminUser()->isActive()->latest()->get();
            }
        } catch (\Throwable $th) {
            dd($th.' Table is Empty or Not Found');
        }
    }

    public function render()
    {
        return view('livewire.task.task-list');
    }
}
