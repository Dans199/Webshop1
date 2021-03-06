<?php namespace App\Http\Controllers;
use App\Grupas as Grupas;
use App\Image_groups as Image_groups;
use App\category as Category;
use App\Products as Product;
use App\Order as Order;
use App\OrderItem as OrderItem;

class OrderController extends Controller {

            /*
    |--------------------------------------------------------------------------
    | Order controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling  all orders made by registered users.
    |
    */


        public function __construct()
    {
        $this->middleware('auth');
    }


	public function getOrder() //returns order input form
	{

		$cart = \Cart::content();
		$total=\Cart::total();
		return view('orders.orders')->with('cart', $cart)->with('total', $total);


	}

    public function getOrderDone() //returns view when order has been compleated
    {

        return view('orders.Order_done');

    }



	public function postOrder() //post input data from order form in database
	{
		$input = \Input::all();
		$rules = array('name' => 'required',
		 'address' => 'required|max:255',
		 'p_index' => 'required|min:6', 
		 'tel' => 'required|numeric|digits:8');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $order = new Order();
                        $order->name = $input['name'];
                        $order->address = $input['address'];
                        $order->p_index = $input['p_index'];
                        $order->tel = $input['tel'];
                        $order->user_id = \Auth::id();
                        $order->save();
                       
                        $cart = \Cart::content();
               
                        foreach($cart as $row)
                        {
                                if(isset($cart))
                                {

                                        $orderitem = new OrderItem();
                                        $orderitem->product_id = $row->id;
                                        $orderitem->order_id = $order->id;
                                        $orderitem->cena = $row->price;
                                        $orderitem->quantity =  $row->qty;
                                        $orderitem->save();

                                }
                                
                       
                                
                        }

                        \Cart::destroy();

                         return \Redirect::to('/order/done');
                } else {
                        return \Redirect::to('/order')->withErrors($validator);
                }
		}
}
