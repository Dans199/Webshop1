<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Grupas as Grupa ;
use App\Category ;
use App\Products ;
use App\Order;
use App\OrderItem;


class OrdersController extends Controller{

  public function showOrders()
   {

   	$Orders =Order::Latest()->paginate(5);

   	return view('Admin/Orders.Order')->with('Orders', $Orders);

  	}

  	public function showOrderItems($id)
    {
    $Order =Order::find($id);
    $Products = Products::all();
   	$OrderItems =OrderItem::where('order_id', $id)->paginate(5);

   	return view('Admin/Orders.OrderItems')->with('OrderItems', $OrderItems)->with('Products', $Products)->with('Order', $Order);

  	}

   public function AddOrders()
   {

   	return view('Admin/Orders.Order_add');
   }

  	public function postOrders()
   	{

   		$input = \Input::all();
		$rules = array(
			'name' => 'required',
		 'address' => 'required',
		 'p_index' => 'required', 
		 'tel' => 'required|numeric');

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
               
				return \Redirect::to('admin/Orders')->with('success', "Kategorija veiksmīgi izmainīta");
				}

				else
				{
			 	return \Redirect::back()->withErrors($validator);

				}
	}

	public function DeleteProducts($id)

   	{			
   			$Product = Products::find($id);

		if ($Product->delete())
		{
			   return \Redirect::to('/admin/Products')->with('success', "Prece veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::to('/admin/Products')->with('fail', "An error occured while deleting the Product.");
			}


  
    }

    public function EditOrders($id)
	{
		 $Order = Order::find($id);

		return view('Admin/Orders.Order_edit', [
			'id' => $Order->id
			, 'name' => $Order->name
			, 'address' =>$Order->address
			, 'p_index' =>$Order->p_index
			, 'tel' =>$Order->tel
		]);
	}

	public function postEdit($id)
	{
		  $order = Order::find($id);
		 $input = \Input::all();

		$rules = array(
		'name' => 'required',
		 'address' => 'required',
		 'p_index' => 'required', 
		 'tel' => 'required|numeric');

		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {

         $order->name = $input['name'];
         $order->address = $input['address'];
         $order->p_index = $input['p_index'];
         $order->tel = $input['tel'];
         $order->user_id = \Auth::id();
		 $order->updated_at=time();
		 $order->save();

		return \Redirect::to('admin/Orders')->with('success', "Kategorija veiksmīgi izmainīta");
		}
		else
		{
		return \Redirect::back()->withErrors($validator);
		}

	}





}