<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Products[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {

       // $products = Products::all();
        //return view('product_list',['products'=>$products]);
       // return view('product_list', compact('products'));
        //return Products::all();
       // return view('product_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('products_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'min:3|string|max:255|required',
            'amount' =>'min:1|int|required',
        ],
        [
            'name.min' => 'Nazwa produktu musi się składać z conajmniej 3 znaków',
            'name.max' => 'Nazwa produktu nie może być dłuższa niż 25 znaków',
            'name.required' => 'Nazwa produktu musi być uzupełniona',
            'amount.min' => 'Ilość musi być większa od 0',
            'amount.required' => 'Ilość produktu musi być podana',
            ]);
        $auth_user = $request->user();
        $current_date = date('Y-m-d H:i:s');

        $products = new Products;
        $products->name = $request->input('name');
        $products->amount = $request->input('amount');
        $products->status = "0";
        $products->data =  $current_date;
        $products->group_id = $auth_user->group_id;
        $products->save();
        return redirect('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $products = Products::find($id);
        return view('edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'min:3|string|max:25|required',
            'amount' =>'min:1|int|required',
        ],
            [
                'name.min' => 'Nazwa produktu musi się składać z conajmniej 3 znaków',
                'name.max' => 'Nazwa produktu nie może być dłuższa niż 25 znaków',
                'name.required' => 'Nazwa produktu musi być uzupełniona',
                'amount.min' => 'Ilość musi być większa od 0',
                'amount.required' => 'Ilość produktu musi być podana',
            ]);
        $auth_user = $request->user();
        $current_date = date('Y-m-d H:i:s');

        $products = Products::find($id);
        $products->name = $request->input('name');
        $products->amount = $request->input('amount');
        $products->status = $request->input('status');
        $products->data =  $current_date;
        $products->group_id = $auth_user->group_id;
        $products->update();
        return redirect('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Products::find($id)->delete();

        return redirect()->back();
        //$products = Products::find($id);
       // $products->where('id',$id)->delete();

        //return redirect()->back()->with('status','Student Deleted Successfully');
    }
    public function display(Request $request)
    {
        $auth_user = $request->user()->group_id;
        $products = Products::where('group_id',$auth_user)->get();
        return view('product_list',['products'=>$products]);
    }
}
