<?php 
    interface ResidenteRepositoryInterface{
        public function createResidente(array $data);
        public function indexResidente();
        public function updateResidente(array $data);
        public function getResidenteById(int $id);
        public function deleteResidente(int $id);
    }

?>