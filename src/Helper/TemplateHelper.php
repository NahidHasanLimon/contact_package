<?php 
use Nahidhasanlimon\Contact\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

// use DB;
 class TemplateHelper {
    
    function bind_to_template($replacements, $template_content) {
        return preg_replace_callback('/{{(.+?)}}/',
                 function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template_content);
    }
    function template_content(){ //demo function
        $template_content = file_get_contents(__DIR__ . '/../views/email/template.blade.php');
        $replacements = array(
            'name' => '',
            'mobile_number' => '',
            'email' => '',
            'area' =>'',
        );
        $replaced_stored_content = $this->bind_to_template($replacements, $template_content);
    }


    function contact_response_email_content($contact){
        $template = EmailTemplate::where('purpose','contact_response')->where('status','active')->first();
        if(!is_null($template)){
            $template_content = $template->content;
            $replacements = array(
                'name' => $contact->name,
                'mobile_number' => $contact->phone_number,
                'email' => $contact->email,
                'area' => $contact->area,
            );
        }
        else{
            $template_content = file_get_contents(__DIR__ . '/../views/email/template.blade.php');
            
        }
        return htmlspecialchars_decode($this->bind_to_template($replacements, $template_content)); 
       
    }

    function template_variable_bind_to_template($replacements, $template) { //demo function
        return preg_replace_callback('/{{(.+?)}}/',
                 function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }
    
      
}