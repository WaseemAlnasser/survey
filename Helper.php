
<?php

    use Mews\Purifier\Facades\Purifier;
    function public_path($path)
    {
        // get the base url
        $base_url = $_SERVER['HTTP_HOST'];
        return 'http://'. $base_url. '/public/'.$path;
    }

   function url($path){
        return 'alnasserwaseem.site'.$path;
   }

   function user(){
       return $_SESSION['user'] ?? '';
   }

   function user_check(){
       return isset($_SESSION['user']);
   }

   function is_admin(){
       return user_check() && user()->admin;
   }

   function adminMiddleware($next){
       if(!is_admin()){
           header('Location: ' . '/login');
           exit;
       }
       return $next();
   }

   function isAuthMiddleware($next){
       if(user_check()){
           header('Location: ' . '/');
           exit;
       }
       return $next();
   }

   function authMiddleware($next){
        if(!user_check()){
           header('Location: ' . '/login');
       }
        return $next();
   }

   function redirect($path){
        header('Location: ' . $path);
       exit;
   }

   function render_drag_drop_form_builder($questions){
       $output = '';

       $form_fields = $questions;
       $output .= '<ul id="sortable" class="available-form-field main-fields">';
       if (!empty($form_fields)) {
           $select_index = 0;
           foreach ($form_fields as $key => $field) {
               $options = '';
               $required_field = '';
               if ($field->required == '1' ) {
                   $required_field = 'on';
               }
               if ($field->type === 'select' || $field->type === 'multiselect' || $field->type === 'radio' || $field->type === 'checkbox') {
                   $options =  $field->options;
               }
               $output .= form_builder_field_markup($key, $field->type, $field->name, $field->placeholder, $field->label, $required_field, $options);
           }
       } else {
           $output .= form_builder_field_markup('1', 'text', 'your-name', 'Your Name', '');
       }

       $output .= '</ul>';
       return $output;
   }

 function form_builder_field_markup($key, $type, $name, $placeholder, $label , $required, $options)
{
    $name = esc_html($name);
    $placeholder = esc_html($placeholder ?? '');
    $required_check = !empty($required) ? 'checked' : '';
    $output = '<li class="ui-state-default">
                     <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                    <span class="remove-fields">x</span>
                    <a data-bs-toggle="collapse" href="#fileds_collapse_' . $key . '" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        ' . ucfirst($type) . ': <span
                                class="placeholder-name">' . $label . '</span>
                    </a>';
    $output .= '<div class="collapse" id="fileds_collapse_' . $key . '">
            <div class="card card-body pt-3">
                <input type="hidden" class="form-control" name="field_type[]"
                       value="' . $type . '">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required class="form-control field-name" name="field_name[' . $key . ']"
                           placeholder="enter field name"
                           value="' . $name . '" >
                </div>
                <div class="form-group">
                    <label>Label</label>
                    <input type="text" required class="form-control field-label"
                           name="field_label[' . $key . ']" placeholder="enter field placeholder/label"
                           value="' . $label . '" >
                </div>
               ';
        if ($type === 'text' || $type === 'textarea') {
            $output .= '<div class="form-group">
                        <label>PlaceHolder</label>
                        <input type="text" required class="form-control field-placeholder"
                               name="field_placeholder[' . $key . ']" placeholder="enter field placeholder/label"
                               value="' . $placeholder . '" >
                    </div>';
        }else{
            $output .= '<input type="hidden" class="field-placeholder" name="field_placeholder[' . $key . ']" value="">';
        }
    $output .= '
                <div class="form-group">
                    <label ><strong>Required</strong></label>
                    <label class="switch">
                        <input type="checkbox" class="field-required" ' . $required_check . ' name="field_required[' . $key . ']">
                        <span class="slider onff"></span>
                    </label>
                </div>';
    if ($type === 'select' || $type === 'multiselect' || $type === 'radio' || $type === 'checkbox') {
        $output .= '<div class="form-group">
                        <label>Options</label>
                            <textarea name="select_options[' . $key . ']" required class="form-control field-options max-height-120" cols="30" rows="10"
                                required>' . esc_html($options ?? "")  . '</textarea>
                           <small>separate option by comma ","</small>
                    </div>';
    }else{
        $output .= '<input type="hidden" class="field-options" name="select_options[' . $key . ']" value="">';
    }
    $output .= '</div></div></li>';

    return $output;

}

    function render_question($question){
        $name = esc_html($question->name);
        $placeholder = esc_html($question->placeholder ?? '');
        $label = esc_html($question->label ?? '');
        $required_check = $question->required == 1 ? 'required' : '';
        // render the question based on the type for the user to answer it
        $output = '';
        $output .= '<div class="form-group mb-4">';
        $output .= '<label>' . $label . '</label>';
        switch ($question->type) {
            case 'text':
            {
                $output .= '<input type="text" '.$required_check.' class="form-control" name="' . $name . '" placeholder="' . $placeholder . '">';
                break;
            }
            case 'textarea':
            {
                $output .= '<textarea name="' . $name . '" '.$required_check.' class="form-control" cols="30" rows="10" placeholder="' . $placeholder . '"></textarea>';
                break;
            }
            case 'select':
            {
                $options = explode(',', $question->options) ?? [];
                $output .= '<select name="' . $name . '" '.$required_check.' class="form-control">';
                foreach ($options as $option) {
                    $output .= '<option>' . $option . '</option>';
                }
                $output .= '</select>';
                break;
            }
            case 'multiselect':
            {
                $options = explode(',', $question->options);
                $output .= '<select name="' . $name . '[]" '.$required_check.' class="form-control select2" multiple>';
                foreach ($options as $option) {
                    $output .= '<option>' . $option . '</option>';
                }
                $output .= '</select>';
                break;
            }
            case 'radio':
                {
                    $options = explode(',', $question->options);
                    $output .= '<div class="form-group">';
                    foreach ($options as $option) {
                        $output .= '<div class="form-check">';
                        $output .= '<input class="form-check-input" '.$required_check.' type="radio" name="' . $name . '" value="' . $option . '" id="flexRadioDefault1">';
                        $output .= '<label class="form-check-label" for="flexRadioDefault1">' . $option . '</label>';
                        $output .= '</div> ';
                    }
                    $output .= '</div>';
                    break;
                }
            case 'checkbox':
                {
                    $options = explode(',', $question->options);
                    $output .= '<div class="form-group">';
                    foreach ($options as $option) {
                        $output .= '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="' . $name . '[]" value="' . $option . '" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">' . $option . '</label>
                                        </div>';
                    }
                    break;
                }
            default:
                {
                $output .= '<input type="text" required '.$required_check.' class="form-control" name="' . $name . '" placeholder="' . $placeholder . '">';
                    break;
            }

        }
        $output .= '<input type="hidden" name="question_id[]" value="' . $question->id . '">';
        $output .= '</div>';
        echo $output;
    }

    function survey_taken($survey_id){
        if(empty(user()->id)){
            return 'auth';
        }
        $answer = Answer::where('survey_id', $survey_id)->where('user_id', user()->id)->first();
        if($answer){
            return 'taken';
        }
    }
   function esc_html($val)
    {
        return htmlspecialchars(strip_tags($val));
    }


      function esc_url($val)
    {
        return htmlspecialchars(filter_var($val, FILTER_SANITIZE_URL));
    }


      function kses($val, array $args)
    {
        return strip_tags($val, $args);
    }


      function kses_basic($val): string
    {
        return Purifier::clean($val);
    }

