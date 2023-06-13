@extends('app')
@section('content')
<div class="mt-8 mx-2">
    <div class="flex items-center justify-center mb-8">
        <h1 id="total-sum">Total Sum: </h1>
    </div>
    <div class="mt-8 mx-2">
    <div class="flex items-center justify-center mb-8">
    <table class="table table-sm table-striped" id="table">
    </table>
    </div>
</div>  
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" id="expenditure-form-btn">Load Expenditure Form</button>
    </div>
</div>    
<div class="w-full max-w-xs m-auto mt-8" id="expenditure-form" hidden>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Date</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="datetime-local" name="date" id="date">
            </div>
            <div class="mb-4">
                <label class = "block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
                <select name="category_id" id="category">
                    <option value="">Select Category</option>
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class = "block text-gray-700 text-sm font-bold mb-2" for="amount">Amount</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="amount" id="amount">
            </div>
            <div class="mb-4">
                <label class = "block text-gray-700 text-sm font-bold mb-2" for="details">Details</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="details" id="details">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="submit-expense">Submit</button>
            </div>
        </form>
    </div>
@endsection