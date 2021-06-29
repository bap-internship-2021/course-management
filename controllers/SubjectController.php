<?php


require_once 'models/Subject.php'; // Call the Subject model

class SubjectController extends Subject
{
    /**
     * Get all subjects from subjects table
     */
    public function index()
    {
        $subjects = parent::index();
        // Debug
        // echo '<pre>';
        // print_r($subjects);die();
        include_once 'views/subjects/index.php';

    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        // Get current subject with id from subject model
        $subject = parent::show($id);
//         echo '<pre>';
//         var_dump($subject);die();
        include_once 'views/subjects/edit.php';
    }

    public function updateSubject()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');
        $credit_number = filter_input(INPUT_POST, 'credit_number',  FILTER_VALIDATE_INT);

        $result = parent::update($id, $name, $credit_number);
        if ($result) {
            $_SESSION['edit_subject']['success'] = 'Update subject success';
            header("Location: .?action=edit_subject&id=$id");
        }
    }

}