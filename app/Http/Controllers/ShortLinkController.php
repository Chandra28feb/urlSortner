<?php

namespace App\Http\Controllers;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index(Request $request)  
    {  
        $shortLinks = ShortLink::latest()->get();
        return view('welcome', compact('shortLinks'));  
    } 

    public function store(Request $request)  
    {  
        $request->validate([  
           'link' => 'required|url'  
        ]);  
     
        $input['link'] = $request->link;  
        $input['code'] = Str::random(6);  
     
        ShortLink::create($input);  
    
        return redirect()->back()->with(['status'=>'success', 'message'=>'Shorten Link Generated Successfully!']);  
    }  

    public function shortenLink($code)  
    {  
        $find = ShortLink::where('code', $code)->first();  
        return redirect($find->link);  
    } 
}
