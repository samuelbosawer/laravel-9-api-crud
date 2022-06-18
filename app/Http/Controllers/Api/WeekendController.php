<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weekendmodel;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use Exception;


class WeekendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo `<img src="/weekend/7jGKXZH8KMhG4lVBYQl4EDSEKiYibBBpn8PjVZsg.png" alt="" srcset="">`;
        $data = Weekendmodel::all();
        // $parameter =DB::select('SELECT * FROM weekends ');
        if($data)
        {
            return ApiFormatter::createApi(200,'Success', $data);
        }else{
            return ApiFormatter::createApi(400,'Failed');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                  'name' => 'required',
                  'job' => 'required',
                  'topic' => 'required',
                  'date' => 'required',
                  'jam_mulai' => 'required',
                  'jam_selesai' => 'required',
            ]);
            $imgname = '';

            if($request->picture)
            {
                $imgname = time().$request->picture->getClientOriginalName();
                $request->picture->move(public_path('images'), $imgname);
            };

           
          $weekend =  Weekendmodel::create([
                'name' => $request->name,
                'job' =>  $request->job,
                'topic' => $request->topic,
                'date' => $request->date,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'picture' => $imgname,
             ]);
             $data = Weekendmodel::where('id','=',$weekend->id)->get();
             if($data)
             {
                 return ApiFormatter::createApi(200,'Success', $data);
             }else{
                 return ApiFormatter::createApi(400,'Failed');
     
             }
        } catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');

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
        $data = Weekendmodel::find($id);
        if($data)
        {
            return ApiFormatter::createApi(200,'Success', $data);
        }else{
            return ApiFormatter::createApi(400,'Failed');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        try {
            $request->validate([
                  'name' => 'required',
                  'job' => 'required',
                  'topic' => 'required',
                  'date' => 'required',
                  'jam_mulai' => 'required',
                  'jam_selesai' => 'required',
            ]);
            // $weekend = Weekendmodel::findOrfail($id);
            //  $request->file('image')->store('weekend'),
        //   $weekend->update([
        //         'name' => $request->name,
        //         'job' =>  $request->job,
        //         'topic' => $request->topic,
        //         'date' => $request->date,
        //         'jam_mulai' => $request->jam_mulai,
        //         'jam_selesai' => $request->jam_selesai,
        //         'picture' => '1.jpg',
        //      ]);
             if($request->image){
                $imgname = time().$request->picture->getClientOriginalName();
                $request->picture->move(public_path('images'), $imgname);
            };
            $data['name'] =  $request->name;
            $data['job'] =  $request->job;
            $data['topic'] =  $request->topic;
            $data['date'] =  $request->date;
            $data['jam_mulai'] =  $request->jam_mulai;
            $data['jam_selesai'] =  $request->jam_selesai;
            $user = DB::table('weekends')
            ->where('id', $id)
            ->update($data);
             $data = Weekendmodel::where('id','=',$id)->get();
             if($data)
             {
                 return ApiFormatter::createApi(200,'Success', $data);
             }else{
                 return ApiFormatter::createApi(400,'Failed');
     
             }
        } catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        try{
        $weekend = Weekendmodel::findOrfail($id);
        $data = $weekend->delete();
        if($data)
        {
            return ApiFormatter::createApi(200,'Success', 'Sucess Destrory Data');
        }else{
            return ApiFormatter::createApi(400,'Failed');

        }
    }catch (Exception $error)
    {
        return ApiFormatter::createApi(400,'Failed');
    }

    }
}
