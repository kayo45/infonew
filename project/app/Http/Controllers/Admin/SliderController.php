<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Slider::orderBy('id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('image', function(Slider $data) {
                $image = $data->image ? url('assets/images/sliders/'.$data->image):url('assets/images/noimage.png');
                return '<img width="90" src="' . $image . '" alt="Image">';
            })
            // ->editColumn('name', function(Slider $data) {
            //     return '<strong>'.$data->name.'</strong>';
            // })
            ->addColumn('action', function(Slider $data) {
                return '<div class="action-list"><a data-href="' . route('admin-sldr-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-sldr-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['image','action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.slider.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.slider.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'image' => 'mimes:jpeg,jpg,png,svg',
            'name' => 'required|max:255',
            // 'rank' => 'required|max:255',
            // 'comment' => 'required'
        ];
        $customs = [
            'image.mimes' => 'Image Type is Invalid.',
        ];
        $validator = Validator::make(Input::all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        if ($file = $request->file('image'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/sliders',$name);
            $input['image'] = $name;
        }

        $tstm = Slider::create($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'image' => 'mimes:jpeg,jpg,png,svg',
            'name' => 'required|max:255',
            // 'rank' => 'required|max:255',
            // 'comment' => 'required'
        ];
        $customs = [
            'image.mimes' => 'Image Type is Invalid.',
        ];
        $validator = Validator::make(Input::all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Slider::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('image'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/sliders',$name);
            if($data->image != null)
            {
                if (file_exists(public_path().'/assets/images/sliders/'.$data->image)) {
                    unlink(public_path().'/assets/images/sliders/'.$data->image);
                }
            }
            $input['image'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

      //*** GET Request Status
      public function status($id1,$id2)
        {
            $data = Slider::findOrFail($id1);
            $data->status = $id2;
            $data->update();
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Slider::findOrFail($id);

        @unlink(public_path().'/assets/images/sliders/'.$data->image);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
