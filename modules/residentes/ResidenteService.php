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

    }
?>