<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Exception;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function get()
    {
        return response()->json([
            'status'=>200,
            'data'=>Expense::get(),
        ]);
    }

    public function store(Request $request)
    {
        try{
            $expense = Expense::create([
                'date'=>$request->date,
                'category_id'=>$request->category,
                'amount'=>$request->amount,
                'details'=>$request->details,
            ]);

            $expense->save();
            $category = Expense::with('category')->where('id',$expense->id)->get();
    
            return response()->json([
                'status'=>201,
                'message'=>'Successfully created expense',
                'data'=>[
                    'category'=>$category[0]->category->name,
                    ...$request->except('category')
                ],
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=>500,
                'message'=>$e->getMessage()
            ]);
        }
    }

    public function getTotalSum()
    {
        return response()->json([
            'status'=>200,
            'data'=>$this->expense->select('amount')->get()->sum('amount')
        ]);
    }
}