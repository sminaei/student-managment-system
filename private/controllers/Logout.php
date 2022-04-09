<?php


class Logout extends Controller
{
    function index()
    {
        $errors = array();
        Auth::logout();
            $this->redirect('login');
        }

        }


