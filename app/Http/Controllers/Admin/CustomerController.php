<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            if($request->get('customer_type') == 'shipper')
            {
                $customers_shipper = Customer::get_items_shipper();

                return DataTables::of($customers_shipper)
                    ->addColumn('action', function($customer){
                        $button = '<a href="customer/'.$customer->id.'/edit" data-toggle="tooltip"  data-id="'.$customer->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$customer->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
			
        else 
            {
                $customers_consignee = Customer::get_items_consignee();


            return DataTables::of($customers_consignee)
                ->addColumn('action', function($customer){
                    $button = '<a href="customer/'.$customer->id.'/edit" data-toggle="tooltip"  data-id="'.$customer->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$customer->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            
        }

        return view('pages.admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::get();
        $countries = Country::get();

        return view('pages.admin.customer.create', compact('customers','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cities = City::find($request->get('city'));

		$this->validate($request, [
			'account_code'	=> 'required',
			'name'			=> 'required',
			'city'		    => 'required',
            'phone'         => 'required|numeric',
			'country_id'	=> 'required',
			'group'			=> 'required',
		], [
			'account_code.required'	=> 'ACCOUNT CODE WAJIB DIISI',
			'name.required'         => 'NAMA WAJIB DIISI',
			'city_id.required'		=> 'KOTA WAJIB DIISI',
            'phone.required'        => 'PHONE WAJIB DIISI',
            'phone.numeric'         => 'PHONE WAJIB ANGKA SEMUA DAN TANPA SPASI',
			'country_id.required'	=> 'NEGARA WAJIB DIISI',
			'group.required'		=> 'CUSTOMER TYPE WAJIB DIISI',
		]);

		$data = Customer::where('account_code', '=', $request->input('account_code'))->first();

		if($data === null)
		{
			$data = Customer::create([
				'account_code'          => Request()->account_code,
				'name'                  => Request()->name,
				'company_name'          => Request()->company_name,
				'address'               => Request()->address,
				'city_id'               => Request()->city,
                'city_name'             => $cities,
				'country_id'            => Request()->country_id,
				'phone'                 => Request()->phone,
				'group'                 => Request()->group,
				'postal_code'           => Request()->postal_code,
                'created_by'            => Auth::user()->name
			]);
			return redirect(route('admin.customer.index'))->with('toast_success', 'Berhasil Tambah Data');
		}
		else
		{
			return redirect(route('admin.customer.index'))->with('toast_error', 'Gagal! Account Code Sudah Terdaftar!');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * 
     * 
     * 
     */

    public function autocomplete(Request $request)
    {
        $data = City::select("city")
                ->where("city","LIKE","%{$request['query']}%")
                ->get();
        return response()->json($data);   
    }

    /**
     * Get Customer ID
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerId(Request $request)
	{
		$source = $request->get('source');
		$id = $request->get('id');
		$query = '';

		if ($source == 'city') {
			$city = City::find($id);

			$query = (isset($city->code) ? $city->code : '');
		}
		elseif ($source == 'country')
		{
			$country = Country::find($id);

			$query = (isset($country->alpha3code) ? $country->alpha3code : '');
		}

		if (empty($query))
		{
			return false;
		}

		$customer_id = Customer::get_customer_id($query);

		if (empty($customer_id))
		{
			return response()->json(['status' => false]);
		}

		return response()->json(['status' => true, 'customer_id' => $customer_id]);
	}

    /**
     * 
     * Get Autocomplete Customer
     * 
     */

    public function autocompleteCustomer(Request $request)
    {
        $customers = Customer::select('id', 'name as label')
            ->where('name', 'like', "%{$request->term}%")
            ->get();

        return response()->json($customers);
    }
}
