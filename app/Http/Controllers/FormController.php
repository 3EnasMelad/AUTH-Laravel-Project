<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use App\Models\FormEntry;

//     php artisan config:cache
// php artisan route:cache
// php artisan view:cache

class FormController extends Controller
{

    public function store(Request $request)
    {

        // dd($request->all()); -------------------------------------------------------

        //    to save the name of our form 
        $form = new Form();
        $form->name = $request->name;
        $form->save();

        //to save fields
        foreach ($request->fields as $fieldData) {

            if (!isset($fieldData['name']) || !isset($fieldData['type'])) {
                return redirect()->back()->with('error', 'A field is missing or incomplete');
            }

            // store data in database
            $field = new Field();
            $field->form_id = $form->id;
            $field->field_name = $fieldData['name'];
            $field->field_type = $fieldData['type'];
            $field->is_required = isset($fieldData['required']);
            $field->save();
            return redirect()->route('forms.index');
        }


        // return redirect()->route('forms.index')->with('success', 'Form created successfully');
    }


    //         $field->save();
    //         return redirect()->route('forms.index');
    //     }


    //     return redirect()->back()->with('success', 'created successfully');
    // }




    //funct... GET all forms
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    //ا  الكرييت عموماااااااااااااا
    public function create()
    {
        return view('forms.create');
    }

    // دى عشان نجيب فورم معينه نملاها
    public function fill($formId)
    {
        $form = Form::with('fields')->findOrFail($formId);
        return view('forms.fill', compact('form'));
    }

    // فانكشن حفظ البانات لما ادخلها عادى 
    public function submitForm(Request $request, $formId)
    {
        $form = Form::findOrFail($formId);
        $entryData = json_encode($request->except('_token'));

        $entry = new FormEntry();
        $entry->form_id = $form->id;
        $entry->entry_data = $entryData;
        $entry->save();

        return redirect()->route('forms.index')->with('success', 'sent successfully');
    }

    // delete from db
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->route('forms.index')->with('success', 'deleted successfully');
    }
}
