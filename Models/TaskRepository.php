<?php
namespace mvc\Models;

use mvc\Models\TaskResourceModel;
use mvc\Models\TaskModel;

class TaskRepository
{
    protected $taskResourceModel;

    public function __construct(TaskModel $model)
    {
        $this->taskResourceModel = new TaskResourceModel($model);
    }  
    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }
    public function getAll()
    {
        return $this->taskResourceModel->showAllTasks();
    }
    public function delete($id)
    {
        return $this->taskResourceModel->delete($id);
    }
    public function edit($id)
    {
        return $this->taskResourceModel->edit($id);
    }
    public function get($id)
    {
        return $this->taskResourceModel->showTask($id);
    }
}
