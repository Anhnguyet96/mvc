<?php
namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class TasksController extends Controller
{
 
    public function index()
    {
        $taskRepository = new TaskRepository(new TaskModel());
        $d['tasks'] = $taskRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        $task = new TaskModel();
        $taskRepository = new TaskRepository($task);
        if (isset($_POST["title"])) {
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setCreatedAt(date('Y-m-d H:i:s'));
            $task->setUpdatedAt(date('Y-m-d H:i:s'));
            

            if ($taskRepository->add($model)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        $task = new TaskModel();
        $taskRepository = new TaskRepository($task);
        $d["task"] = $taskRepository->get($id);

        if (isset($_POST["title"])) {
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            $task->setCreatedAt(date('Y-m-d H:i:s'));
            $task->setUpdatedAt(date('Y-m-d H:i:s'));
            
            if ($taskRepository->edit($id)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        
        $taskRepository = new TaskRepository(new TaskModel());
        if ($taskRepository->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
