<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\CustomerOrder;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CustomerOrdersController extends Controller
{
    public function index(){
        return view('admin.orders.index');
    }
    public function getAll(){
        $orders =  CustomerOrder::with('order_items')->get();
        return datatables()->of($orders)

        ->addColumn('order_number', function ($q) {

            return $q->order_number;
        })
    
        ->addColumn('profile', function ($q) {
            $profile = '<div class="profile-info">
            <strong>Full Name:</strong> <span>' . $q->first_name . ' ' . $q->last_name . '</span>

        </div>
        <div class="profile-info">
            <strong>Email:</strong> <span>'. $q->email .'</span>
        </div>
        <div class="profile-info">
            <strong>Phone Number:</strong> <span>' . $q->phone_number . '</span>
        </div>';
        
        return $profile;
        
        })

        ->addColumn('products', function ($q) {
            $products = '<ul>';
            foreach ($q->order_items as $item) {
                $products .= '<li>' . $item->product->name . ' (' . $item->weight . ') Qty: (' . $item->quantity . ')</li>';
            }
            $products .= '</ul>';
            
            return $products;
            
        })

        ->addColumn('status', function ($q) {
            if ($q->status=='pending'){
              
            return '<div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Pending
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button data-message="Are you sure, you want to processing this order?" data-action=' . route('admin.order.status', ['id' => $q->id, 'status' => 'processing']) . '
                                 data-input={"_method":"post"} data-toggle="modal" data-target="#modal-confirm" class="dropdown-item">
                                             Ready to processing
            </button>
            <button data-message="Are you sure, you want to reject this order?" data-action=' . route('admin.order.status', ['id' => $q->id, 'status' => 'rejected']) . '
                                 data-input={"_method":"post"} data-toggle="modal" data-target="#modal-confirm" class="dropdown-item">
                                             Ready to rejected
            </button>
            </div>
          </div>';
            }elseif($q->status=='processing'){
                return '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Processing
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button data-message="Are you sure, you want to on the way this order?" data-action=' . route('admin.order.status', ['id' => $q->id, 'status' => 'on_the_way']) . '
                                     data-input={"_method":"post"} data-toggle="modal" data-target="#modal-confirm" class="dropdown-item">
                                                 Ready to on the way
                </button>
                </div>
              </div>';
            } elseif($q->status=='on_the_way'){
                return '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                On the Way
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button data-message="Are you sure, you want to delivered this order?" data-action=' . route('admin.order.status', ['id' => $q->id, 'status' => 'delivered']) . '
                                     data-input={"_method":"post"} data-toggle="modal" data-target="#modal-confirm" class="dropdown-item">
                                                 Ready to on the way
                </button>
                </div>
              </div>';
            }else{
                return $q->status;
            }

        })
        ->addColumn('action',function($q){   
            return '<a class="btn btn-danger btn-sm" href="#" data-message="Are you sure you want to delete ?"
                                    data-action='.route('admin.order.delete',['id' => $q->id]).'
                                    data-input={"_method":"delete"}
                                    data-toggle="modal" data-target="#modal-confirm" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>' ;
        })


            ->rawColumns(['action','products','status','profile'])
            ->toJson();
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            // 'email' => 'required|email',
            // Add more validation rules as needed
        ]);
    
        // Get the authenticated user
        
        $customer = null;
        $auth = auth('customer')->user();

        // Update or create the customer
        if($request->registered_customer){
            $customer = new Customer();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->password = bcrypt($request->password);
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->save();
        }

        // $checkoutData['customer_id'] = $customer ? $customer->id : null;
        $customer_order = new CustomerOrder();
        if($auth){
            $customer_order->customer_id = $auth->id;
        }else{
            $customer_order->customer_id = $customer ? $customer->id : null;
        }
       
        $customer_order->first_name = $request->first_name;
        $customer_order->last_name = $request->last_name;
        $customer_order->email = $request->email;
        $customer_order->phone_number = $request->phone_number;
        $customer_order->postal_code = $request->postal_code;
        $customer_order->city = $request->city;
        $customer_order->address = $request->address;
        $customer_order->total = $request->sub_total;
        $customer_order->shipping = 'cash on delivery';
        $customer_order->order_number = generateUniqueString();
        $customer_order->holding_number = $request->holding_number;
        $customer_order->save();

        $customer_order_items = [];

        foreach($request->product_ids as $key => $product_id){
        
            $customer_order_items[] = [
                'product_id' => $product_id,
                'customer_order_id' => $customer_order->id, 
                'quantity' => $request->quantites[$key], 
                'weight' => $request->weights[$key],
                'price' => $request->prices[$key],
            ];
        }

        OrderItem::insert($customer_order_items);
        
    
        // Clear the cart session if it exists
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
    
        // Redirect with a success message
        return redirect()->route('welcome.view')->with('success', 'Successfully Submitted');
    }

    public function customer_orders(){
        $auth = auth('customer')->user();
        $data['customer_orders'] = CustomerOrder::with('order_items')->where('customer_id',$auth->id)->get();
        return view('frontend.auth.orders',$data);
    }

    public function order_status($id){
       
        $order = CustomerOrder::findOrFail($id);
        if($order->status=='pending'){
            $order->order_items()->delete();
            $order->delete();
        }
        return back()->with('success', 'Order successfully canceled');
    }
    public function status(Request $request){
        $request_status = CustomerOrder::where('id',$request->id)->firstOrFail();
        $request_status->status=$request->status;
        $request_status->save();

       return redirect()->route('admin.order.index')->with('success', trans('Order status successfully changed'));
   }
   public function delete(Request $request){
       $order = CustomerOrder::where('id',$request->id)->firstOrFail();
       $order->order_items()->delete();
       $order->delete();
       return redirect()->route('admin.order.index')->with('success', trans('Order status successfully deleted'));
   }
}
