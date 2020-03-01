@extends('layouts.app')

@section('head')
    <style>
        .tasks li {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Please work through the issues listed below.</p>
                    <ol class="tasks" style="list-style: decimal inside;">
                        <li>
                            When I try to <a href="{{ route('contacts-create') }}">create a contact </a> I receive an
                            error, can you fix this?
                        </li>
                        <li>
                            The <a href="{{ route('contacts') }}">contacts</a> page seems to be loading quite slowly. Can you put in a fix for this?
                            <br>
                            <small>(In the real world we would use pagination, but the page should still load quickly when loading all records at once.)</small>
                        </li>
                        <li>
                            The company status doesn't seem to be showing on the <a href="{{ route('companies') }}">companies</a> page. Can you
                            make it show?
                        </li>
                        <li>
                            We need to be able store addresses for contacts. Can you create the address resource
                            and allow for addresses to be associated with a contact? A contact can have many addresses.
                        </li>
                        <li>
                            We need to be able to store any orders a company might place. An order belongs to a company, has a unique order number, and
                            is made up of many order items. An order item may just be a free text record
                            that stores some text showing what the item is. An order should also store a record of which
                            contact at the company placed the order.
                            Can you create the resources and screens to allow this information to be entered? We'll also
                            need a new screen alongside <a href="{{ route('contacts') }}">contacts</a> and
                            <a href="{{ route('companies') }}">companies</a> to display all the orders in a table.
                        </li>
                        <li>
                            It would be nice to see orders at a glance. Can you add a list of the ten most recent orders
                            to this page? The list needs to display the order number, company name, contact name, number
                            of items, and date placed for each order.
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
