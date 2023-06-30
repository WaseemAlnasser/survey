<?php


require_once 'app/Models/Survey.php';
require_once 'app/Models/Question.php';
require_once 'app/Models/Answer.php';


class SurveyController {

    public function all()
    {
        adminMiddleware(function (){
            $surveys = Survey::all();
            require "views/admin/survey/all.php";
        });

    }

    public function store()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $success_message = $_POST['success_message'];
        $featured = $_POST['featured'] ?? 0;
        if (!isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['success_message'])) {
            $message = "Please fill all fields";
            $_SESSION['message'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/survey/all');
            return;
        }

        $survey = new Survey();
        $survey->title = $title;
        $survey->description = $description;
        $survey->success_message = $success_message;
        $survey->featured = $featured;
        $survey->save();

        $question = new Question();
        $question->survey_id = $survey->id;
        $question->name = "name";
        $question->label = "Name";
        $question->type = "text";
        $question->placeholder = "Enter your name";
        $question->required = true;
        $question->save();

        $message = "Survey created successfully";
        $_SESSION['msg'] = ["type" => "success", "message" => $message];
        header("Location: " . '/admin/survey/all');
    }

    public function edit()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $success_message = $_POST['success_message'];

        $survey = Survey::find($id);
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['success_message'])) {
            $survey->title = $title;
            $survey->description = $description;
            $survey->success_message = $success_message;
            $survey->featured = $_POST['featured'] ?? 0;
            $survey->save();
        }else{
            $message = "Please fill all fields";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/survey/all');
        }
        unset($_POST['id'],$_POST['title'], $_POST['description'], $_POST['success_message']);
        $data = $_POST;
        if (!$data){
            if ($survey->submit_count > 0) {
                $message = "Survey edited successfully";
                $_SESSION['msg'] = ["type" => "success", "message" => $message];
                header("Location: " . '/admin/survey/all');
                return;
            }
            $message = "you need to add at least one question";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/survey/build?id='.$id);
            return;
        }
        if (!isset($data['field_type']) || !isset($data['field_name']) || !isset($data['field_placeholder'])) {
            $message = "Please fill all fields";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/admin/survey/all');
            return;
        }
        $questions = [];
        $fieldTypes = $data['field_type'];
        $fieldNames = $data['field_name'];
        $fieldPlaceholders = $data['field_placeholder'];
        $fieldLabels = $data['field_label'];
        $fieldRequired = $data['field_required'];
        for ($i = 0; $i < count($fieldTypes); $i++) {
            $question = [
                'field_type' => $fieldTypes[$i],
                'field_name' => $fieldNames[$i],
                'field_placeholder' => $fieldPlaceholders[$i],
                'field_label' => $fieldLabels[$i],
                'field_required' => isset($fieldRequired[$i]) ? true : false,
            ];
            if ($fieldTypes[$i] === 'select' ||  $fieldTypes[$i] === 'radio' ||  $fieldTypes[$i] === 'multiselect') {
                $question['select_options'] = $data['select_options'][$i];
            }
            $questions[] = $question;
        }
        $survey->questions()->delete();
        foreach ($questions as $question) {
            $survey_qurestion = new Question();
            $survey_qurestion->survey_id = $id;
            $survey_qurestion->type = $question['field_type'];
            $survey_qurestion->name = $question['field_name'];
            $survey_qurestion->placeholder = $question['field_placeholder'];
            $survey_qurestion->label = $question['field_label'];
            $survey_qurestion->required = $question['field_required'];
            if ($question['field_type'] === 'select' ||  $question['field_type'] === 'radio' ||  $question['field_type'] === 'multiselect') {
                $survey_qurestion->options = $question['select_options'];
            }
            $survey_qurestion->save();
        }
        $message = "Survey updated successfully";
        $_SESSION['msg'] = ["type" => "success", "message" => $message];
        header("Location: " . '/admin/survey/all');

    }

    public function build()
    {
        adminMiddleware(function () {
            $id = $_GET['id'];
            $survey = Survey::find($id);
            if (!$survey) {
               require "views/404.php";
               return;
            }
            require "views/admin/survey/build.php";
        });
    }

    public function delete()
    {
        $id = $_GET['id'];
        $survey = Survey::find($id);
        $survey->delete();
        $message = "Survey deleted successfully";
        $_SESSION['msg'] = ["type" => "success", "message" => $message ];
        header("Location: " . '/admin/survey/all');
    }

    public function submissions(){
        adminMiddleware(function () {
            $id = $_GET['id'];
            $survey = Survey::find($id);
            if (!$survey) {
                require "views/404.php";
                return;
            }
            $questions = $survey->questions;
            $answers = $survey->answers;
            // get the users who submitted the survey but make it unique
            $users = [];
            foreach ($answers as $answer) {
                if (!in_array($answer->user, $users)) {
                    $user = User::find($answer->user_id);
                    $users[] = $user;
                }
            }
            require "views/admin/survey/submissions.php";
        });
    }

    public function answers()
    {
        adminMiddleware(function () {
            $id = $_GET['id'];
            $user_id = $_GET['user_id'];
            $answers = Answer::where('user_id', $user_id)->where('survey_id', $id)->get();
            $survey = Survey::find($id);
            $user = User::find($user_id);
            if ($answers->count() === 0) {
                require "views/404.php";
                return;
            }
            require "views/admin/survey/answers.php";
        });
    }

    public function survey()
    {
        $id = $_GET['id'];
        $survey = Survey::find($id);
        // check if the user has already submitted the survey
        $answer = Answer::where('user_id', $_SESSION['user']->id)->where('survey_id', $id)->first();
        if ($answer) {
            $message = "You have already submitted this survey";
            $_SESSION['msg'] = ["type" => "danger", "message" => $message];
            header("Location: " . '/');
            return;
        }
        $questions = $survey->questions;
        if (!$survey) {
            require "views/404.php";
            return;
        }
        require "views/survey.php";
    }

    public function submit()
    {
        $id = $_POST['survey_id'];
        $survey = Survey::find($id);
        $questions = $survey->questions;
        $data = $_POST;
        unset($data['id']);
        foreach ($questions as $question) {
            $answer = new Answer();
            $answer->survey_id = $id;
            $answer->question_id = $question->id;
            $answer->user_id = $_SESSION['user']->id;
            if ( $question->type === 'multiselect') {
                 $answer->response = implode(",", $data[$question->name] ?? []);
            }else{
                $answer->response = $data[$question->name] ?? "";
            }
            $answer->save();
        }
        $survey->submit_count = $survey->submit_count + 1;
        $survey->save();
        $user =  User::find($_SESSION['user']->id);
        $user->submit_count = $user->submit_count + 1;
        $user->save();
        $message = $survey->success_message;
        $_SESSION['msg'] = ["type" => "success", "message" => $message ];
        header("Location: " . '/');
    }
}


