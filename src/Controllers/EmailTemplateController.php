<?php

namespace Nahidhasanlimon\Contact\Controllers;

use Nahidhasanlimon\Contact\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use DB;
class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = EmailTemplate::orderBy('id', 'desc')->get();
        return view('contact::template.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact::template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'purpose' => 'required',
            'content' => '',
            'attachment' => '',
        ]);
        $template = new EmailTemplate();
        $template->title = $request->title;
        $template->purpose = $request->purpose;
        $template->content = htmlentities($request->content);
        $template->preview_image = 'default.jpg';
        try {
            $template->save();
            return back()->with('success','Thank you for contacting with us.');
        } catch (\Throwable $th) {
            return back()->with('error','Failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $template)
    {
        $e_temp = file_get_contents(__DIR__ . '/../views/email/template.blade.php');
        // $e_temp = htmlspecialchars_decode($template->content);
        $replacements = array(
            'content' => htmlspecialchars_decode($template->content),
        );
        $updated_temp = $this->bind_to_template($replacements, $e_temp);
        // $updated_temp = $this->bind_to_template($replacements, $e_temp);

        return view('contact::template.view',compact('template','updated_temp','e_temp'));
    }
    function bind_to_template($replacements, $template) {
       
        return preg_replace_callback('/{{(.+?)}}/',
                 function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }
    public function change_status(EmailTemplate $template)
    {
        DB::table('email_templates')->where('status','active')->update(
            [
                'status' => 'inactive'
            ]
        );
        // $template->status = 'active';
        $template->update([
            'status' => 'active'
        ]);
        // dd($template->get());
        return back()->with('success','Active successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }
}
