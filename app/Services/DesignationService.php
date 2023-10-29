<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DesignationService
{

    public function get()
    {
        return DB::table('designations')->where('status_id',1)->get();
            
    }
    public function add($data){
        DB::table('designations')->insert([
            'name'=>$data['name'],
            'status_id'=> 1,
        ]);        
    }
    public function update($data, $id){
        DB::table('designations')->where('id', $id)->update([
            'name'=>$data['name'],
        ]);
        
    }
    public function delete($id){
        DB::table('designations')->where('id', $id)->update([
            'status_id' => '2',
        ]);
    }
}
