<?php 
use Nahidhasanlimon\Contact\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;
// use DB;
 class TemplateHelper {
    
    function bind_to_template($replacements, $template) {
        return preg_replace_callback('/{{(.+?)}}/',
                 function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }
    function contact_response_email_content($content){
        $default_email_template = file_get_contents(__DIR__ . '/../views/email/template.blade.php');
        $replacements = array(
            'content' => htmlspecialchars_decode($content),
        );
        $replaced_content = $this->bind_to_template($replacements, $default_email_template);
        return $replaced_content;
    }
      
}