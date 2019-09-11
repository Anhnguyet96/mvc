<?php  
namespace mvc\Models;

class TaskRepository
{
	public $objResourceModel;

	public function __construct()
	{
		$this->objResourceModel = new TaskResourceModel();
	}

	public function add($model)
	{
		
		$this->objResourceModel->add($model);
	}

	public function edit($model)
	{
		$this->objResourceModel->edit($model);
	}

	public function delete($id)
	{
		$this->objResourceModel->delete($id);
	}

	public function get($id)
	{
		return $this->objResourceModel->get($id);
	}

	public function getAll()
	{
		return $this->objResourceModel->getAll();
	}
}
