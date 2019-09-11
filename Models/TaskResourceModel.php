<?php
namespace mvc\Models;

use mvc\Core\ResourceModel;
use mvc\Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct(TaskModel $model)
    {
        $this->_init('tasks', 'id', $model);
    }
}
