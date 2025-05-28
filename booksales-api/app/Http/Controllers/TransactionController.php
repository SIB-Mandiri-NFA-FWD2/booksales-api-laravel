<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transactions::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No transaction found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All transactions',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $book = Books::find($request->book_id);

        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup',
            ], 400);
        }

        $totalAmount = $book->price * $request->quantity;

        $book->stock -= $request->quantity;
        $book->save();

        $transaction = Transactions::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil membuat transaksi',
            'data' => $transaction
        ], 201);
    }

    public function show($id){
        $transaction = Transactions::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Transaction',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $transaction = Transactions::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        $Data = Books::find($transaction->book_id);
        $newData = Books::find($request->book_id);

        $Data->stock += $transaction->quantity;
        $Data->save();

        if ($newData->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup',
            ], 400);
        }

        $newData->stock -= $request->quantity;
        $newData->save();

        $totalAmount = $newData->price * $request->quantity;

        $transaction->update([
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $transaction
        ]);
    }

    public function destroy($id){
        $transaction = Transactions::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'No transaction found',
            ], 404);
        }

        $book = Books::find($transaction->book_id);
        $book->stock += $transaction->quantity;
        $book->save();

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
        ], 200);
    }
}