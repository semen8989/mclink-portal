<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $title = __('label.expenses');
        return view('expense.index',compact('title','expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('label.add_expense');
        $expense_types = ExpenseType::all();
        $companies = Company::all();
        $users = User::all();
        return view('expense.create',compact('title','expense_types','companies','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        if($request->hasFile('bill_copy')){
            //Get just extension
            $extension = $request->file('bill_copy')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = time().'.'.$extension;
            //Upload image
            $path = $request->file('bill_copy')->storeAs('public/bill_copies',$fileNameToStore);
       } else {
            $fileNameToStore = '';
       }
       //Inserting new data
       $data = $request->except('bill_copy');
       $data['bill_copy'] = $fileNameToStore;
       Expense::create($data);
       //Redirect after success
       return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $title = __('label.view_expense');
        return view('expense.show',compact('expense','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
