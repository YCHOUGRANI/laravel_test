@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders-create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            orders
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company name</th>
                                <th>Company Address</th>
                                <th>Number of Item(s)</th>
                                <th>Date</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->company->name }} ({{ $order->company->companyType->name }})</td>
                                    <td>{{ $order->company->contacts[0]->first_name }} {{ $order->company->contacts[0]->last_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>   {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>

                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                       {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
