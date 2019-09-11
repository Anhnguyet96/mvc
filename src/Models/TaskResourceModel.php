<?php 
namespace mvc\Models;

use mvc\Models\Tasks;
use mvc\Config\Bootstrap;

class TaskResourceModel
{
	public function __construct()
	{
		$this->task = new Tasks();
		$this->entityManager = Bootstrap::getEntityManager();
	}
	public function add($model)
	{
		$this->entityManager->persist($model);
		$this->entityManager->flush();
	}

	public function edit($model)
	{
		$arr = $this->task->getProperties($model);
		$id = $arr['id'];
		$this->task = $this->entityManager->find('\mvc\Models\Tasks', $id);
		foreach ($arr as $key => $value) {
			$this->task->{'set' . ucfirst($key)}($value);
		}
		$this->entityManager->persist($this->task);
		$this->entityManager->flush();
		;
	}

	public function delete($id)
	{
		
		$this->task = $this->entityManager->find('\mvc\Models\Tasks', $id);
		$this->entityManager->remove($this->task);
		$this->entityManager->flush();
	}

	public function get($id)
	{
		$value = $this->entityManager->find('\mvc\Models\Tasks', $id);
		return $this->task->getProperties($value);
	}

	public function getAll()
	{
		$tasksRepository = $this->entityManager->getRepository('\mvc\Models\Tasks');
		$tasks = $tasksRepository->findAll();
		$value = [];
		foreach ($tasks as $task) {
			$value [] = $this->task->getProperties($task); 
		}      
		return $value;
	}
}
