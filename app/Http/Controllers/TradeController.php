<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trade;
use App\Image;
use Intervention\Image\ImageManager;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $trades = Trade::with('images')->where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
      return view('trade.index',compact('trades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $trade = request()->except(['_token']);
      $trade['user_id'] = auth()->user()->id;
      $trade = Trade::create($trade);    
      if (request()->hasFile('image'))
      {
        $path = request()->image->store('public');
        Image::create(['trade_id'=>$trade->id,'title'=>request()->input(['title']),'path'=>$path]);
      }
      return back();
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
        $trade = Trade::find($id);
        if (request()->hasFile('image'))
        {
          $path = request()->image->store('public');
          Image::create(['trade_id'=>$trade->id,'title'=>request()->input(['title']),'path'=>$path]);
          return back();
        }
        if($request->input('exit'))
        {

          if($trade->position() == 'long')
          {
            if($request->input('exit') > $trade->entry)
            {
              $trade['status'] = 'won';
            }else{
              $trade['status'] = 'lost';
            }
          }
          if($trade->position() == 'short')
          {
            if($request->input('exit') < $trade->entry)
            {
              $trade['status'] = 'won';
            }else{
              $trade['status'] = 'lost';
            }
          }
        }
        $trade->update($request->except(['_token','_method']));
        return back();
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
