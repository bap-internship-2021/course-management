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

}