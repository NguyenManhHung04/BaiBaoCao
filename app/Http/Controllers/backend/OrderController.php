<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function restore(string $id){
        $order = Order::find($id);
        if($order==null){
            return redirect()->route('admin.order.index');
        }
        $order->status=2;
        $order->updated_at=date('Y-m-d H:i:s');
        $order->updated_by=Auth::id()??1;

        $order->save();
        return redirect()->route('admin.order.trash')->with('success', 'Order đã được khôi phục thành công.');
    }
    public function delete(string $id){
        $order = Order::find($id);
        if($order==null){
            return redirect()->route('admin.order.index');
        }
        $order->status=0;
        $order->updated_at=date('Y-m-d H:i:s');
        $order->updated_by=Auth::id()??1;

        $order->save();
        return redirect()->route('admin.order.index')->with('success', 'Order đã được xóa vào thùng rác thành công.');
    }
    public function status($id)
    {
        $order = Order::find($id);
        if ($order) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $order->status = $order->status == 1 ? 2 : 1;
            $order->save();
        }

        return redirect()->route('admin.order.index')->with('success', 'Order đã được cập nhật trạng thái thành công.');
    }
    public function index()
    {
        $list = Order::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","delivery_name","delivery_email","delivery_phone")
        ->get();
        return view("backend.order.index",compact("list"));
    }
    public function trash(){
        $list = Order::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("id","delivery_name","delivery_email","delivery_phone")
        ->get();
        return view("backend.order.trash",compact("list"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Order::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->select("id","delivery_name","delivery_email","delivery_phone")
        ->get();
        return view("backend.order.create",compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        return view("backend.order.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $order = Order::find($id);
        if($order==null){
            return redirect()->route('admin.order.index');
        }
        $order->delete();
        return redirect()->route('admin.order.trash')->with('success', 'Order đã được xóa khỏi cơ sở dữ liệu thành công.');
    }
    
}
