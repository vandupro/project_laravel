<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FeeShip;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(){
        $models = FeeShip::orderBy('id', 'desc')->get();
        $output = '';
        $output .= '
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên tỉnh/thành phố</th>
                        <th>Tên quận huyên</th>
                        <th>Xã phường</th>
                        <th>Phí ship</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach($models as $m){
            $output .= '
            <tr>
                <td>'.$m->city->name.'</td>
                <td>'.$m->province->name.'</td>
                <td>'.$m->ward->name.'</td>
                <td class="fee-ship" contenteditable data-fee_id='.$m->id.'>'.number_format($m->fee, 0,',','.').'</td>
            </tr>
            ';
        }
        $output .= '
                    </tbody>
                </table>
            </div>
        ';
        echo $output;
    }
    public function create(){
        $cities = City::orderBy('matp', 'asc')->get();
        return view('admin.ships.create', compact('cities'));
    }
    public function store(Request $request){
       $data = $request->all();
       $output = '';
       if($data['action'] == 'city'){
           $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'asc')->get();
           $output .= '<option >--Chọn quận huyện--</option>';
           foreach($select_province as $s){
               $output .= "<option value=".$s->maqh.">".$s->name."</option>";
           }
       }else{
            $select_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'asc')->get();
            $output .= '<option >--Chọn xã phường--</option>';
            foreach($select_ward as $s){
                $output .= "<option value=".$s->xaid.">".$s->name."</option>";
            }
       }
       echo $output;
    }
    public function store_fee(Request $request){
        $model = new FeeShip();
        $model->fill($request->all());
        $model->save();
    }   
    public function update(Request $request){
        $model = FeeShip::find($request->fee_id);
        $model->fee = rtrim($request->fee_value, '.');
        $model->save();
        return response()->json([
            'data'=>$request->all()
        ]);
    }
    public function delete($id){
        
    }
}
