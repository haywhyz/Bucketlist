<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bucketlist;
use App\Item;

class BucketlistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
      $bucket = Bucketlist::all();
      return response()->json($bucket);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'created_by' => 'required'
        ]);
        $bucket = new Bucketlist;
        $bucket->name= $request->name;
        $bucket->created_by = $request->created_by;

        
        $bucket->save();
        return response()->json($bucket, 201);
    }

    public function show($id)
    {
        $bucket = Bucketlist::find($id);
        return response()->json($bucket, 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'item_id'=> 'nullable',
            'created_by' => 'required'
        ]);
        $bucket= Bucketlist::findOrFail($id);
        
        $bucket->name = $request->input('name');
        $bucket->created_by = $request->input('created_by');
        $bucket->save();
        return response()->json($bucket, 200);
    }
   public function destroy($id)
   {
        $bucket= Bucketlist::findOrFail($id);
        $bucket->delete();
        return response('Deleted Successfully', 200);
   }
   public function itemCreate($id)
   {
        $bucket = Bucketlist::findOrFail($id);

        $item = new Item;
        $item->name = $request->input('name');
        $item->done = $request->input('done');
        $bucket->items()->save($item);
        // $item->save();
        return response()->json($bucket, 200);
   }
   public function itemList(Bucketlist $bucket, Item $item)
   {
    $bucket = Bucketlist::find($id);
    $item = $bucket->item;
    return response()->json($item, 200);

   }

   

   

   
}
