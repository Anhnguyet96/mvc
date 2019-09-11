<?php
namespace mvc\Models;

/**
* @Entity @Table(name="tasks")
*/
class Tasks
{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;
    /** @Column(type="string") */
    protected $title;
    /** @Column(type="string") */
    protected $description;
    /** @Column(type="datetime") */
    protected $created_at;
    /** @Column(type="datetime") */
    protected $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function getProperties($model){
        return get_object_vars($model);
    }

}
