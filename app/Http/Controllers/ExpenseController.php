<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\DataTables\ExpenseDataTable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExpenseDataTable $dataTable)
    {
        $title = __('label.expenses');
        
        return $dataTable->render('expense.index',compact('title'));
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
        
        return view('expense.create',compact('title','expense_types','companies'));
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
            $extension = $request->file('bill_copy')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('bill_copy')->storeAs('public/bill_copies',$fileNameToStore);
       } else {
            $fileNameToStore = '';
       }
        $data = $request->except('bill_copy');
        $data['bill_copy'] = $fileNameToStore;
        
        Expense::create($data);

        $action = __('label.global.response.action.created');
        $message = __('label.global.response.success.general', ['module' => __('label.expense'), 'action' => $action]);

        return session()->flash('success',$message);
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
        $title = __('label.edit_expense');
        $expense_types = ExpenseType::all();
        $companies = Company::all();
        $users = Company::find($expense->company_id)->company_users;
        $status = Expense::STATUS;
        
        return view('expense.edit',compact('expense','title','expense_types','companies','users','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        if($request->hasFile('bill_copy')){
            Storage::delete('public/bill_copies/'.$expense->bill_copy);

            $extension = $request->file('bill_copy')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->file('bill_copy')->storeAs('public/bill_copies',$fileNameToStore);
        }else{
            $fileNameToStore = $expense->bill_copy;
        }
        $data = $request->except('bill_copy');
        $data['bill_copy'] = $fileNameToStore;
        $expense->update($data);

        $action = __('label.global.response.action.updated');
        $message = __('label.global.response.success.general', ['module' => __('label.expense'), 'action' => $action]);

        return session()->flash('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        Storage::delete('public/bill_copies/'.$expense->bill_copy);

        $expense->delete();

        $action = __('label.global.response.action.deleted');
        $message = __('label.global.response.success.general', ['module' => __('label.expense'), 'action' => $action]);

        return redirect()->route('expenses.index')->with('success',$message);
    }

    public function downloadFile($expense)
    {
        return Storage::disk('public')->download('bill_copies/'.$expense);
    }
}
