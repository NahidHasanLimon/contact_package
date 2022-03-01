<?php

namespace Nahidhasanlimon\Contact\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Nahidhasanlimon\Contact\Models\Contact;
use Nahidhasanlimon\Contact\Models\EmailTemplate;
use TemplateHelper;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('contact::contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = EmailTemplate::find(1);
        $template_helper = new TemplateHelper();
        


        $details['body'] = $template_helper->contact_response_email_content($template->content);
        $details['to'] = 'nh.limon2010@gmail.com';
            // dd();
      dispatch(new \Nahidhasanlimon\Contact\Jobs\ContactResposneJob($details));
        return view('contact::contact.create');
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
            'email' => 'required|max:255',
            'name' => 'required',
            'phone_number' => 'required',
            'area' => 'required',
            'description' => '',
            'attachment' => '',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->area = $request->area;
        $contact->description = $request->description;
        try {
            $contact->save();

            $details['email'] = $request->email;
            // dd();
            dispatch(new \Nahidhasanlimon\Contact\Jobs\ContactResposneJob($details));

            return back()->with('success','Thank you for contacting with us.');
        } catch (\Throwable $th) {
            return back()->with('error','Failed.');
        }
        
       
    }
    public function marked_all_seen(Request $request){
        try{
            Contact::where('status','unseen')->update([
                'status' => 'seen'
            ]);
            return back()->with('success','Marked all contacts as seen.');
        }
        catch(Exception $ex){
            return back()->with('error','Failed!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
