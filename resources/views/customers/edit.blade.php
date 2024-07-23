@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Customer</h1>
    <div class="mb-4">
        <a href="{{ route('customers.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Back</a>
    </div>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" name="name" value="{{ $customer->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" value="{{ $customer->email }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
