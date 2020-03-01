<?php
namespace App\Http\Controllers;
//
use App\Contact;
use App\Company;
use App\Order;
use App\OrderItem;
use App\Item;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Http\Request;
use Facades\App\Repository\Orders;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

       $orders =Order::paginate(10);
         
        return view('orders.index', compact(['orders']));
    }


    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order;
        $companies = Company::pluck('name', 'id');
        $items = Item::pluck('name', 'id');
        return view('orders.create', compact(['order', 'companies', 'items']));
      
    }

     public function getContacts($company_id=null)
    {   
        $contacts=Contact::where('company_id',$company_id)->get();
        return json_encode($contacts);
     }


      /**
     *
     * @param CreateContact $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $request)
    {   
     // validate incoming request
        
        $validator = Validator::make($request->all(), [
           'company_id' => 'required|exists:companies,id',
           'contact_id' => 'required|exists:contacts,id',
           'item_ids' => 'required'
       ],
        [
           'company_id.required' => 'Please select company for this order',
           'contact_id.required' => 'Please select contact for this order',
           'item_ids.required' => 'Please select item for this order'
        ]
        );
        
       if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
       }
	$order=Order::create([
         'quantity' => count($request->item_ids),
          'company_id' => $request->company_id,
          'contact_id' => $request->contact_id
        ]);
       for($i=0;$i<count($request->item_ids);$i++){
       OrderItem::create([
         '' => count($request->item_ids),
          'order_id' => $order->id,
          'item_id' => $request->item_ids[$i]
        ]);
       }
  
        return redirect('orders')->with('alert', 'Order created!');
    }

    /**
     *
     * @param Order $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $contacts = Contact::pluck('first_name', 'id');
        $companies = Company::pluck('name', 'id');
        $items = OrderItems::pluck('desc', 'id');
        return view('orders.edit', compact(['order', 'companies', 'order_items']));
    }

    /**
     *
     * @param UpdateOrder $request
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, Order $order)
    {
        $order->update($request->all());
        return redirect('orders')->with('alert', 'order updated!');
    }
}
