<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Principle;
use App\Models\RoadMap;

class widgetsController extends Controller
{
    public function principles()
    {
        $data['principles'] = Principle::where(['status' => 'Active'])->latest()->get()->toArray();
        return view('admin.pages.principles',$data);
    }

    public function store_principle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:4294967295',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        try {
            // $user = auth()->user();
            $message  = NULL;
            Session::forget('msg');
            $saved = Principle::updateOrCreate(
                ['id' => $request->id ?? NULL],
                [
                    'title' => strtoupper($request->title),
                    'desc' => $request->desc,
                    'created_by' => Auth::id(),
                ]
            );
            $message = "Principle " . ($request->id ? "Updated" : "Saved") . " Successfully";
            Session::flash('msg', $message);

            $data['principles'] = Principle::where(['status' => 'Active'])->latest()->get()->toArray();
            return view('admin.pages.principles',$data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error storing Transection', 'error' => $e->getMessage()], 500);
        }
    }

    public function roadmaps()
    {
        $data['roadmaps'] = RoadMap::where(['status' => 'Active'])->latest()->get()->toArray();
        return view('admin.pages.roadmap',$data);
    }

    public function store_roadmaps(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:4294967295',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        try {
            // $user = auth()->user();
            $message  = NULL;
            Session::forget('msg');
            $saved = RoadMap::updateOrCreate(
                ['id' => $request->id ?? NULL],
                [
                    'title' => strtoupper($request->title),
                    'desc' => $request->desc,
                    'created_by' => Auth::id(),
                ]
            );
            $message = "Roadmap " . ($request->id ? "Updated" : "Saved") . " Successfully";
            Session::flash('msg', $message);
            
            $data['roadmaps'] = RoadMap::where(['status' => 'Active'])->latest()->get()->toArray();
            return view('admin.pages.roadmap',$data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error storing', 'error' => $e->getMessage()], 500);
        }
    }
}
