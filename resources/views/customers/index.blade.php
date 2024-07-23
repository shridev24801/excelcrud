@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Customer List</h1>
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 fade-out">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 mb-4 fade-out">
            {{ session('error') }}
        </div>
    @endif
    <div class="mb-4">
        <a href="{{ route('customers.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New Customer</a>
        <a href="{{ route('customers.export') }}" class="bg-green-500 text-white py-2 px-4 rounded">Export Customers</a>
    </div>
    <form action="{{ route('customers.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <input type="file" name="file" required class="border p-2">
        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded">Import Customers</button>
    </form>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td class="border px-4 py-2">{{ $customer->id }}</td>
                <td class="border px-4 py-2">{{ $customer->name }}</td>
                <td class="border px-4 py-2">{{ $customer->email }}</td>
                <td class="border px-4 py-2">{{ $customer->phone }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded">View</a>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
