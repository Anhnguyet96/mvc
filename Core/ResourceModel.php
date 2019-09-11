<?php
    namespace mvc\Core;
    use mvc\Core\ResourceModelInterface;
    use mvc\Config\Database;
    
    class ResourceModel implements ResourceModelInterface{
        protected $table;
        protected $id;
        protected $model;
        public function _init($table, $id, $model){
            $this->table = $table;
            $this->id = $id;
            $this->model = $model;
        }
        public function save($model){
            $str = $this->model->getProperties();
            $keys = '';
            $values= '';
            foreach ($str as $key => $value) {
                $keys .= $key.", ";
                $values .= "'".$value."', " ;
            } 
            $sql = "INSERT INTO " .$this->table. " (".trim($keys,", ").") VALUES (".trim($values,", "). ")";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();

        }
        public function delete($id){
            $str = $this->model->getProperties();
            $sql = "DELETE FROM ".$this->table ." WHERE id = ".$id;
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        }
        public function showTask($id){
            $sql = "SELECT * FROM ". $this->table ." WHERE id = ?;";
            $req = Database::getBdd()->prepare($sql);
            $req->execute([$id]);
            return $req->fetch();
        }
        public function showAllTasks(){
            $sql = "SELECT * FROM ".$this->table;
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        }
        public function edit($id){
            $s = $this->model->getProperties();
            $update='';
            foreach($s as $key => $value){
                $update.=$key." = '".$value."', ";
            }
            $sql = "UPDATE ".$this->table." SET ".trim($update, ", ") ." WHERE id = ?;";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
    }

?>
