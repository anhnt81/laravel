<?php
namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDeTail;
use App\User;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
class PageController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $sp = DB::table('bill_detail')->join('products',function($join){
            $join->on('bill_detail.id_product','=','products.id')->where('bill_detail.quantity','>',4);
        })
        ->get();
        return view('page.trangchu',compact('slide','sp'));
    }
    public function getSpmoi(Request $req){
        $new_product = Product::where('new',1)->paginate(8);
        if($req->ajax()){
            return view('paginate.product',['new_product'=>$new_product])->render();
        }
        return view('page.new_product',compact('new_product'));
    }
    public function getSpkm(){
        $sanpham_khuyenmai=Product::where('promotion_price','>',0)->paginate(8);
        return view('page.promotion_product',compact('sanpham_khuyenmai'));
    }
    public function getLoaiSp($type) {
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sanpham_khac = Product::where('id_type','<>',$type)
        -> paginate(3);
        $loai_sp = ProductType::all();
        $loai = ProductType::where('id',$type)->first();

        return view('page.loai-sanpham',compact('sp_theoloai','sanpham_khac','loai_sp','loai'));
    }
    public function getSp(Request $req) {
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);

        return view('page.chi-tiet-san-pham',compact('sanpham','sp_tuongtu'));
    } 
    public function getGioithieu() {

        return view('page.gioithieu');
    }
    public function getLienhe() {

        return view('page.lienhe');
    }
    public function getAddtocart(Request $req, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);

        return redirect()->back();
    }

    public function getDelItemCart($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getCheckout() {

        return view('page.dat-hang');
    }

    public function postCheckout(Request $req) {
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name_customer = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();
        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();
        foreach ($cart -> items  as $key => $value) {
            $bill_detail = new BillDeTail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');

        return redirect()->back()->with('thongbao','Đặt Hàng Thành Công');
    }
    public function getLogin(){

        return view('page.login');
    }
    public function postLogin(Request $req) {
        $this->validate($req,
            [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
            ],
            [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email không đúng',
            'password.required' => 'Bạn Phải nhập mật khẩu',
            'password.min' => 'Mật Khẩu bạn nhập quá ngắn',
            'password.max' => 'Mật khẩu phải ít hơn 20 kí tự'
            ]);
        $admin = array('email'=> $req->email,'password'=> $req->password,'role'=>1);
        $user = array('email'=> $req->email,'password'=> $req->password,'role'=>0);
        if (Auth::attempt($admin)) {
            return redirect('admin')->with([
                'flag'=>'success',
                'message'=>'Đăng nhập thành công']);
        } 
        else if(Auth::attempt($user)) {
            return redirect()->route('trang-chu');
        } else {

            return redirect()->back()->with([
                'flag'=>'danger',
                'message'=>'Sai Tài Khoản Hoặc mật Khẩu']);
        }
    }
    public function getSignup() {

        return view('page.signup');
    }
    public function postSignup(Request $req) {

        $this->validate($req,    
            [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            'address'=>'required',
            'phone'=>'required|min:10|max:11',
            're_password'=>'required|same:password'
            ],
            [
            'email.required'=>'Vui Lòng Nhập Email!',
            'email.email'=>'Định dạng email không đúng',
            'email.unique'=>'Email có người sử dụng',
            'fullname.required'=>'Bạn phải nhập Họ Tên',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'phone.required'=>'Bạn vui lòng nhập số điện thoại',
            'phone.min'=>'Số điện thoại không hợp lệ',
            'phone.max'=>'Số điện thoại không hợp lệ',
            'password.required'=>'Bạn Phải nhập password',
            're_password.required'=>'Bạn Phải Nhập Lại mật khẩu',
            're_password.same'=>'Mật Khẩu nhập lại không đúng',
            'password.min'=>'Mật Khẩu phải ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu phải ít hơn 20 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back()->with('dangkithanhcong','Đăng Kí Thành công');
    }

    public function getLogout() {
        Auth::logout();
        $cart = Session::get('cart');
        Session::forget('cart');

        return redirect()->route('trang-chu');
    }
    public function Logout() {
    Auth::logout();
    $cart = Session::get('cart');
    Session::forget('cart');

    return redirect()->route('trang-chu');
    }

    public function getAccount($id) {
        $account = User::find($id);

        return view('page.account',compact('account'));
    }

    public function updateAccount($id, Request $req) {
        
        $this->validate($req,    
            [
            'email'=>'required|email',
            'fullname'=>'required',
            'address'=>'required',
            'phone'=>'required|min:10|max:11',
            ],
            [
            'email.required'=>'Vui Lòng Nhập Email!',
            'email.email'=>'Định dạng email không đúng',
            'fullname.required'=>'Bạn phải nhập Họ Tên',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'phone.required'=>'Bạn vui lòng nhập số điện thoại',
            'phone.min'=>'Số điện thoại không hợp lệ',
            'phone.max'=>'Số điện thoại không hợp lệ',
            ]);
        $account = User::find($id);
        $account->full_name = $req->fullname;
        $account->email = $req->email;
        $account->password = Hash::make($req->password);
        $account->phone = $req->phone;
        $account->address = $req->address;
        $account->save();

        return redirect()->back()->with('message','Cập Nhật Thành công');
    }
    public function getSearch(Request $req) {
        $product = Product::where('name','like','%'.$req->key.'%')
        ->orWhere('unit_price',$req->key)
        ->get();

        return view('page.search',compact('product'));
    }

    public function admin() {
        $users = User::paginate(10);
        return view('admin.list_user',compact('users'));
    }

    public function showUser() {
        $users = User::paginate(10);
        return view('admin.list_user',compact('users'));
    }
    public function edit($id) {
        $users = User::find($id);

        return view('admin.edit_user',compact('users'));
    }
    public function update($id, Request $req) {
        $this->validate($req,
            [
            'name' =>'required|max:20',
            'phone'=>'required|min:10|max:11',
            'address'=>'required'
            ],
            [
            'phone.min'=>'Số ĐT bạn nhập không đúng',
            'phone.max'=>'Số ĐT bạn nhập không đúng'
            ]);
        $user = User::find($req->id);
        $user->full_name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back();
    }
    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('message','Xóa Thành Công');
    }
    public function search(Request $req) {
        $user = User::where('full_name','like','%'.$req->key.'%')
        ->orWhere('email','like','%'.$req->key.'%')
        ->paginate(10);

        return view('admin.search_user',compact('user'));
    }
    public function postCreate(Request $req) {
        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;
        if($user->save()){
            return redirect()->route('list.user')->with('message','Add user success !');
        }else{
            return redirect()->route('list.user')->with('message','Add user error    !');
        }
    }
    public function showProducttype() {
        $types = ProductType::paginate(10);
        return view('admin.list_producttype',compact('types'));
    }

    public function editType($id) {
        $types = ProductType::find($id);

        return view('admin.edit_producttype',compact('types'));
    }
    public function updateType($id, Request $req) {
        $this->validate($req,
            [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|max:2048',
            ],
            [
            'name.required'=>'Tên loại bánh không được trống',
            'description.required'=>'Cần mô tả loại bánh',
            'image.image'=>'Bạn phải tải ảnh có kiểu là jpg,jpeg hoặc png',
            'image.required'=>'Cần phải có ảnh',
            'image.max'=>'Dung lượng quá cho phép'
            ]);
        $types = ProductType::find($id);
        $destinationPath = 'public/source/image/product';
        $file = $req->image;
        $types->image = Input::file('image')->move($destinationPath,$file);
        $types->name = $req->name;
        $types->description = $req->description;
        $types->save();

        return redirect()->route('list.producttype')->with('message','cập nhật thành công');
    }
    public function searchtype(Request $req) {
        $types = ProductType::where('name','like','%'.$req->key.'%')
        ->paginate(10);

        return view('admin.search_producttype',compact('types'));
    }
    public function getCreatetype() {

        return view('admin.create_prtype');
    }
    public function postCreatetype(Request $req) {
        $type = new ProductType();
        $destinationPath = 'public/source/image/product/';
        $file = $req->image;
        $type->image = Input::file('image')->move($destinationPath,$file);
        $type->name = $req->name;
        $type->description = $req->description;
        $type->save();

        return redirect()->route('list.producttype')->with('message','Thêm loại sp thành công');
    }
    public function deleteType($id) {
        $type = ProductType::find($id);
        $type->delete();

        return redirect()->back()->with('message','Xóa thành công');
    }
    public function showProduct() {
        $products = Product::paginate(10);

        return view('admin.list_product',compact('products'));
    }
    public function createdProduct(Request $req) {
        $product = new Product();
        $destinationPath = 'public/source/image/product/';
        $file = $req->image;
        $product->id_type = $req->type;
        $product->image = Input::file('image')->move($destinationPath,$file);
        $product->name = $req->name;
        $product->description = $req->description;
        $product->unit_price  = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->unit = $req->unit;
        $product->new = $req->new;
        $product->save();

        return redirect()->back()->with('message','Thêm Thành Công');
    }
    public function editProduct($id) {
        $product = Product::find($id);
        return view('admin.edit_product',compact('product'));
    }
    public function updateProduct($id, Request $req) {
        $this->validate($req,
            [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|max:2048',
            ],
            [
            'name.required'=>'Tên loại bánh không được trống',
            'description.required'=>'Cần mô tả loại bánh',
            'image.image'=>'Bạn phải tải ảnh có kiểu là jpg,jpeg hoặc png',
            'image.required'=>'Cần phải có ảnh',
            'image.max'=>'Dung lượng quá cho phép'
            ]);
        $product = Product::find($id);
        $destinationPath = 'public/source/image/product';
        $file = $req->image;
        $product->image = Input::file('image')->move($destinationPath,$file);
        $product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->unit = $req->unit;
        $product->new = $req->new;
        $product->save();

        return redirect()->route('list.product')->with('message','cập nhật thành công');
    }
    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
    public function searchProduct(Request $req) {
        $products = Product::where('name','like','%'.$req->keyword.'%')
                            ->orWhere('unit_price',$req->keyword)
                            ->paginate(10);

        return view('admin.search_product',compact('products'));
    }
    public function getBills() {
        $bills = DB::table('bills')
                ->join('bill_detail','bill_detail.id_bill','=','bills.id')
                ->join('customer','bills.id_customer','=','customer.id')
                ->join('products','bill_detail.id_product','=','products.id')
                ->select('bill_detail.*','bills.date_order','bills.total','bills.payment','bills.note','bills.status','products.name','customer.name_customer')
                ->paginate(10);
        return view('page.bills',compact('bills'));
    }
    public function deleteBills($id) {
        DB::table('bills')
                ->join('bill_detail','bills.id','=','bill_detail.id_bill')
                ->where('bill_detail.id',$id)
                ->delete();

                return redirect()->back()->with('message','Xóa Thành Công');
    }
    public function detailnoSell() {
         $bills = DB::table('bills')
                ->join('bill_detail','bill_detail.id_bill','=','bills.id')
                ->join('customer','bills.id_customer','=','customer.id')
                ->join('products','bill_detail.id_product','=','products.id')
                ->select('bill_detail.*','bills.date_order','bills.total','bills.payment','bills.note','bills.status','products.name','customer.name_customer')
                ->where('bills.status',0)
                ->paginate(10);
        return view('admin.detail_sell',compact('bills'));
    }
    public function detailSold() {
        $bills = DB::table('bills')
                ->join('bill_detail','bill_detail.id_bill','=','bills.id')
                ->join('customer','bills.id_customer','=','customer.id')
                ->join('products','bill_detail.id_product','=','products.id')
                ->select('bill_detail.*','bills.date_order','bills.total','bills.payment','bills.note','bills.status','products.name','customer.name_customer')
                ->where('bills.status',1)
                ->paginate(10);
        return view('admin.detail_sold',compact('bills'));
    }
    public function payMent(Request $req){
        $bills = Bill::find($req->id);
        $bills->status = 1;
        $bills->save();

        return redirect()->route('sold.detail');
    }
}
