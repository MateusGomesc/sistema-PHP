<?php

require_once __DIR__ . "/../vendors/Redirect/Redirect.php";
require_once __DIR__ . "/../vendors/FlashMessage/FlashMessage.php";
require_once "../../models/UsuarioModel.php";

class UsuarioController {

    private $model;

    function __construct()
    {
        $this->model = new UsuarioModel();
    }

    public function read() {
        return $this->model->read();
    }

    public function add(Usuario $c) {
        return $this->model->create($c);
    }

    public function edit(Usuario $c) {
        return $this->model->update($c);
    }

    public function editPassword(string $oldPassword, string $newPassword, int $id, string $confirmedPassword) {
        if($newPassword === $confirmedPassword){
            $user = $this->model->findId($id);

            if($user->getSenha() == $oldPassword){
                $user->setSenha($newPassword);
                FlashMessage::setMessage("A senha foi alterada!", 1);
                return $this->model->updatePass($user);
            }
            
            FlashMessage::setMessage("A senha antiga não confere!", 0);
            Redirect::refresh();
        }
        
        FlashMessage::setMessage("A nova senha não confere!", 0);
        Redirect::refresh();
    }

    public function findId($id) {
        return $this->model->findId($id);
    }

    public function remove($id) {
        return $this->model->delete($id);
    }

}