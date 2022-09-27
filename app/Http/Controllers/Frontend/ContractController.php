<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function create()
    {
        return view('frontend.contract.create');
    }
    public function store(Request $request)
    {
        $data = self::validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required|max:5000',
        ]);

        $data['user_id']=Auth::id();
        Contract::create($data);
        toast('Message Submited','success');
        return redirect()->back();
    }
}
