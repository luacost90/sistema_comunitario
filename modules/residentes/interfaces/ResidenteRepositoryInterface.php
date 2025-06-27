<?php 
    interface ResidenteRepositoryInterface{
        public function createResidente(array $data);
        public function indexResidente();
        public function updateResidente(int $id, array $data);
    }

?>