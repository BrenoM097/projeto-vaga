<?php

namespace app\controllers;

use app\models\People;
use Exception;
use PDOException;

class PeopleController extends People
{
    public function home()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $peoples = $this->search($search);
        } else {
            $peoples = $this->findAll();
        }

        require_once __DIR__ . '/../views/home.php';
    }

    public function cadastro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->create();
                $_SESSION['message'] = $_POST['nome'] . ' cadastrado com sucesso!';
                header('Location: /projeto-vaga/?router=People/home');
            } catch (PDOException $e) {
                $_SESSION['emailErrorMessage'] = 'Email já registrado no sistema!';
                $_SESSION['emailCadastro'] = $_POST['email'];
                $_SESSION['nomeCadastro'] = $_POST['nome'];
                header('Location: /projeto-vaga/?router=People/cadastro');
            }
            exit();
        }

        require_once __DIR__ . '/../views/cadastro.php';
    }

    public function deletar()
    {
        if (isset($_GET['id'])) {
            $this->destroy($_GET['id']);
            header('Location: /projeto-vaga/?router=People/home');
            exit();
        }
        require_once __DIR__ . '/../views/home.php';
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $this->update($id, $nome, $email);
            $_SESSION['message'] = $_POST['nome'] . ' atualizado com sucesso!';
            header('Location: /projeto-vaga/?router=People/home');
            exit();
        } else {
            if (isset($_GET['id'])) {
                $pessoa = $this->findById($_GET['id']);
                require_once __DIR__ . '/../views/editar.php';
            } else {
                header('Location: /projeto-vaga/?router=People/home');
                exit();
            }
        }
    }

    public function sortear()
    {
        $peoples = $this->findAll();

        if (count($peoples) % 2 != 0) array_pop($peoples); //caso seja impar o numero de pessoas, remove a ultima

        shuffle($peoples);

        $duplas = [];
        for ($i = 0; $i < count($peoples); $i += 2) {
            $duplas[] = [$peoples[$i]['nome'] . ' tirou ' . $peoples[$i + 1]['nome']];
        }
        $_SESSION['message'] = 'Sorteio realizado com sucesso!';
        require_once __DIR__ . '/../views/sorteados.php';
    }
}
