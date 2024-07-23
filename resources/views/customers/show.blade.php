@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Customer Details</h1>

    <div class="mb-4">
        <a href="{{ route('customers.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Back to List</a>
    </div>

    <div class="bg-white shadow-md rounded p-6 mb-4">
        <h2 class="text-xl font-semibold mb-2">Customer Information</h2>
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p><strong>Created At:</strong> {{ $customer->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Updated At:</strong> {{ $customer->updated_at->format('Y-m-d H:i:s') }}</p>
    </div>

    <div class="mb-4">
        <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
        </form>
    </div>
</div>
@endsection
