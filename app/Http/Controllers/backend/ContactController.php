<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function restore(string $id)
    {
        $conttact = Contact::find($id);
        if ($conttact == null) {
            return redirect()->route('admin.contact.index');
        }
        $conttact->status = 2;
        $conttact->updated_at = date('Y-m-d H:i:s');
        $conttact->updated_by = Auth::id() ?? 1;

        $conttact->save();
        return redirect()->route('admin.contact.trash')->with('success', 'Contact đã được khôi phục thành công.');
    }
    public function delete(string $id)
    {
        $conttact = Contact::find($id);
        if ($conttact == null) {
            return redirect()->route('admin.contact.index');
        }
        $conttact->status = 0;
        $conttact->updated_at = date('Y-m-d H:i:s');
        $conttact->updated_by = Auth::id() ?? 1;

        $conttact->save();
        return redirect()->route('admin.contact.index')->with('success', 'Contact đã được xóa vào thùng rác thành công.');
    }
    public function status($id)
    {
        $conttact = Contact::find($id);
        if ($conttact) {
            // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
            $conttact->status = $conttact->status == 1 ? 2 : 1;
            $conttact->save();
        }

        return redirect()->route('admin.contact.index')->with('success', 'Contact đã được cập nhật trạng thái thành công.');
    }
    public function index()
    {
        $list = Contact::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "email", "phone")
            ->get();
        return view("backend.contact.index", compact("list"));
    }
    public function trash()
    {
        $list = Contact::where('status', '=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "email", "phone")
            ->get();
        return view("backend.contact.trash", compact("list"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Contact::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "email", "phone")
            ->get();
        return view("backend.contact.create", compact("list"));
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
        $conttact = Contact::find($id);
        if ($conttact == null) {
            return redirect()->route('admin.contact.index');
        }
        return view("backend.contact.show", compact("conttact"));
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
        $conttact = Contact::find($id);
        if ($conttact == null) {
            return redirect()->route('admin.contact.index');
        }
        $conttact->delete();
        return redirect()->route('admin.contact.trash')->with('success', 'Contact đã được xáo khỏi cơ sỡ dữ liệu thành công.');
    }
}
