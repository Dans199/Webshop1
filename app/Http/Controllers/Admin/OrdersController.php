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

   	return view('Admin/Orders.OrderItems')->with('OrderItems', $OrderItems)->with('Products', $Products)->with('Order', $Order)->with('id', $id);

  	}

   public function AddOrders()
   {

   	return view('Admin/Orders.Order_add');
   }

   public function AddOrdersItems($id)
   {

   	$Group = Grupa::all();
   	$Categories = Category::all();

   	return view('Admin/Orders.Orderitem_add')->with('id', $id)->with('Group', $Group);

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
               
				return \Redirect::to('admin/Orders')->with('success', "Pasūtītājums pievienots");
				}

				else
				{
			 	return \Redirect::back()->withErrors($validator);

				}
	}


	public function postOrdersItems()
   	{

   		$input = \Input::all();
		$rules = array(
		'order_id' => 'required',
		 'products' => 'required',
		 'quantity' => 'required|numeric');


		$price = Products::find($input['products'])->pluck('price');

		 $validator = \Validator::make($input, $rules);
               
                if ($validator->passes())
                {
                        $OrderItem = new OrderItem();
                        $OrderItem->quantity = $input['quantity'];
                        $OrderItem->product_id = $input['products'];
                        $OrderItem->order_id = $input['order_id'];
                        $OrderItem->cena=$price;
                        $OrderItem->save();
               
				return \Redirect::to("/admin/Orders/$OrderItem->order_id/items")->with('success', "Produkts pievienots");
				}

				else
				{
			 	return \Redirect::back()->withErrors($validator);

				}
	}




		public function DeleteOrders($id)

   	{			
   			$Order = Order::find($id);
   			$Order->orderitem()->delete();

		if ($Order->delete())
		{
			   return \Redirect::back()->with('success', "Pasūtijums  veiksmīgi izdzēst!");
		}
			else
			{
				   return \Redirect::back()->with('fail', "An error occured while deleting the Product.");
			}


  
    }




	public function DeleteOrderItems($id)

   	{			
   			$OrderItem = OrderItem::find($id);

		if ($OrderItem->delete())
		{
			   return \Redirect::back()->with('success', "Pasūtijuma Preces veiksmīgi izdzēsta!");
		}
			else
			{
				   return \Redirect::back()->with('fail', "An error occured while deleting the Product.");
			}


  
    }



    public function EditOrders($id)
	{
		 $Order = Order::find($id);

		return view('Admin/Orders.OrderItem_edit', [
			'id' => $Order->id
			, 'name' => $Order->name
			, 'address' =>$Order->address
			, 'p_index' =>$Order->p_index
			, 'tel' =>$Order->tel
		]);
	}

	  public function EditOrderItems($id)
	{
		$OrderItem = OrderItem::find($id);
		$Products = Products::all();


		return view('Admin/Orders.OrderItem_edit', [
			'id' => $OrderItem->id
			, 'quantity' => $OrderItem->quantity
			, 'cena' =>$OrderItem->cena
		])->with('OrderItem',$OrderItem)->with('Products',$Products);
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
			public function postOrderItemEdit($id)
		{
		  $OrderItem = OrderItem::find($id);
		 $input = \Input::all();

		$rules = array([
		'quantity' => 'required|numeric',
		'cena' => 'required|numeric|regex:/^\d*(\.\d{2})?$/']);
		 $validator = \Validator::make($input, $rules);

		if ($validator->passes())
        {

         $OrderItem->quantity = $input['quantity'];
         $OrderItem->cena = $input['cena'];
		 $OrderItem->updated_at=time();
		 $OrderItem->save();

		return \Redirect::to("/admin/Orders/$OrderItem->order_id/items")->with('success', "Kategorija veiksmīgi izmainīta");
		}
		else
		{
		return \Redirect::back()->withErrors($validator);
		}
	}





}