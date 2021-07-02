<?php


require_once 'models/Subject.php'; // Call the Subject model
require_once 'validators/subjects/EditSubjectRequest.php';
require_once 'validators/subjects/CreateSubjectRequest.php';
require_once 'controllers/LoginController.php';
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

    public function storeSubject()
    {
        $name = filter_input(INPUT_POST, 'name');
        $credit_number = filter_input(INPUT_POST, 'credit_number', FILTER_VALIDATE_INT);
        $isValidData = CreateSubjectRequest::validateCreateInfoSubject(['name' => $name, 'credit_number' => $credit_number]);
        if ($isValidData == true) {
            if (parent::store($name, $credit_number)) {
                $_SESSION['create_subject']['success'] = 'Create subject success';
                header("Location: .?action=subjects"); // return view list subject
            }
        } else {
            header("Location: .?action=subjects"); // return view list subject with error
        }
    }

    public function detailSubject()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $subject = parent::show($id);
        include_once 'views/subjects/detail.php';
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!isset($id)) {
            include_once 'views/errors/404.php';
            die();
        }
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
        $credit_number = filter_input(INPUT_POST, 'credit_number', FILTER_VALIDATE_INT);
        $isValidData = EditSubjectRequest::validateEditInfoSubject(['name' => $name, 'credit_number' => $credit_number]);

        if ($isValidData == true) { // if pass validate
            $result = parent::update($id, $name, $credit_number); // update subject
            if ($result == true) { // if update success
                $_SESSION['edit_subject']['success'] = 'Update subject success';
                header("Location: .?action=edit_subject&id=$id"); // return back with success
            } else {
                die('some thing error please try again');
            }
        } else {
            header("Location: .?action=edit_subject&id=$id"); // return back with error
        }
    }

    public function deleteSubject()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $result = parent::destroy($id);
        if ($result) {
            $_SESSION['delete_subject']['success'] = 'Delete subject success';
            header('Location: .?action=subjects');
        } else {
            die('Error delete!');
        }
    }

}