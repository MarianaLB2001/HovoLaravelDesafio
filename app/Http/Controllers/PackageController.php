<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PackageController extends Controller
{
    function index()
    {
        return view('packages.index');

    }

    public function create(Request $request)
    {
        $package=new Package();
        $package->name=$request->name;
        $package->email=$request->email;
        $package->product=$request->product;
        $package->amount=$request->amount;
        $package->created=date('Y-m-d');
        $package->modified=date('Y-m-d');
        $package->save();
        return redirect()->route('packages')->with('status', 'Produto adicionado à encomenda com sucesso!');
    }

    public function list()
    {
        //carregar lista de packages da encomenda
        $packages=Package::orderby('id','desc')->paginate();
        //$products=Product::orderby('id','desc')->paginate();

        $encomendas = DB::table('packages')
                    ->join('products', 'packages.product', '=', 'products.product')
                    ->select('packages.*', 'products.price')
                    ->get();
        //abrir página para exibir packages da encomenda
        // return view('packages.list',['packages'=>$packages]);
        return view('packages.list',['encomendas'=>$encomendas,'packages'=>$packages]);
    }

    public function modal($id)
    {
        //carregar lista de produtos paginada
        $packages=Package::orderby('id','desc')->paginate();
        //abrir página para exibir os produtos da encomenda
        return view('packages.list',['packages'=>$packages,'id'=>$id]);
    }

    public function delete(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.list')->with('status', 'Produto removido da encomenda com sucesso!');
    }


    public function destroy()
    {
        // $email=Package::select('email')->where()->get();
         //Mail::to($email)->send(new SendMail());
         Mail::to('mari01barreto@hotmail.com')->send(new SendMail());

        Package::truncate();
        return redirect()->route('packages')->with('status', 'Encomenda Realizada com Sucesso!');
    }
}
