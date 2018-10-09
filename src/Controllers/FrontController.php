<?php
/**
 * Created by PhpStorm.
 * UserModel: air
 * Date: 08/10/2018
 * Time: 15:46
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\MessageModel;
use App\Models\RoomModel;
use App\Models\UserModel;

class FrontController extends Controller
{


    /**
     * Home page
     */
    public function index()
    {
        $this->isLoggedIn();
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();
        $this->render('front/index.html', ['title' => 'Acceuil', 'rooms' => $rooms]);
    }

    /**
     * Tchat page
     */
    public function tchat()
    {
        $this->isLoggedIn();
        $userModel = new UserModel();
        $roomModel = new RoomModel();
        $messageModel = new MessageModel();


        $id = $_SESSION['user_id'];

        if (!empty($_SESSION['room_id'])) {
            $roomId = $_SESSION['room_id'];
        }

        if (!empty($_POST['room'])) {
            $roomId = $_SESSION['room_id'] = $_POST['room'];

        }

        if (empty($roomId)) {
            $this->redirectTo('/');
        }


        $userModel->hasCurrentRoom($id, $roomId, 1);


        $user = $userModel->find($id);
        $room = $roomModel->find($roomId);
        $messages = $messageModel->findByRoomId($roomId);
        $logged_users = $userModel->findLoggedByRoomId($roomId);

        if (!empty($_POST['response'])) {

            $message = $_POST['response'];
            try {
                $messageModel->insertMessage($user, $room, $message);
            } catch (\Exception $e) {
                @trigger_error("Le message n'a pas pu être introduit");
            }


            array_push($messages, [
                'pseudo' => $user['pseudo'],
                'content' => $message
            ]);
        }


        $this->render('front/tchat.html', [
            'title' => 'Tchat',
            'user' => $user,
            'room' => $room,
            'messages' => $messages,
            'logged_users' => $logged_users
        ]);
    }

    /**
     * Login page
     */
    public function login()
    {
        $errors = '';
        if (isset($_POST['_pseudo']) && isset($_POST['_password'])) {
            $userModel = new UserModel();
            $user = $userModel->findUserByCredentials($_POST['_pseudo'], $_POST['_password']);

            if (!empty($user)) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_pseudo'] = $user['pseudo'];

                $userModel->isLogged($user['id'], 1);

            } else {
                $errors = 'Pseudo/Password ne sont pas correctes';
            }

        }

        if (isset($_SESSION['user_id'])) {
            $this->redirectTo('/');
        }


        $this->render('security/login.html', [
            'title' => 'Connexion',
            'errors' => $errors
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {


        $userModel = new UserModel();
        $id = $_SESSION['user_id'];
        $roomId = $_SESSION['room_id'];
        $userModel->isLogged($id, 0);
        $userModel->hasCurrentRoom($id, $roomId, 0);


        session_destroy();
        $this->redirectTo('/login');
    }
}