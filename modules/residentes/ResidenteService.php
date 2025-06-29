<?php
    require_once 'interfaces/ResidenteRepositoryInterface.php';

    class ResidenteService{
        private ResidenteRepositoryInterface $repository;

        public function __construct(ResidenteRepositoryInterface $repository){
            $this->repository = $repository;
        }

        public function saveResidente(array $data): bool{
            return (bool) $this->repository->createResidente($data);
        }

        public function listResidente(){
            return $this->repository->indexResidente();
        }

        public function editResidente(array $data){
            return $this->repository->updateResidente($data);
        }

        public function deleteResidente(int $id){
            return $this->repository->deleteResidente($id);
        }

        public function getResidenteById(int $id){
            return $this->repository->getResidenteById($id);
        }

    }
?>