<?php
namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskRepository;
use mvc\Models\Tasks;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["title"]))
        {
            $task = new TaskRepository();
            $objTask = new Tasks();
            $objTask->setTitle($_POST["title"]);
            $objTask->setDescription($_POST["description"]);
            $objTask->setCreated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $objTask->setUpdated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $task->add($objTask);
            header("Location: " . WEBROOT . "task/index");
        }
        $this->render("create");
    }

    public function edit($id)
    {
        $task = new TaskRepository();
        $d["task"] = $task->get($id);
        if (isset($_POST["title"]))
        {
            $objTask = new Tasks();
            $objTask->setId($id);
            $objTask->setTitle($_POST["title"]);
            $objTask->setDescription($_POST["description"]);
            $objTask->setCreated_at($d['task']['created_at']);
            $objTask->setUpdated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $task->edit($objTask);
            header("Location: " . WEBROOT . "task/index");        
        }
        $this->set($d); 
        $this->render("edit");
    }

    public function delete($id)
    {
        $task = new TaskRepository();
        $task->delete($id);
        header("Location: " . WEBROOT . "task/index");
    }
}
?>