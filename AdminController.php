<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Produk;

class AdminController extends Controller
{

    public function approvePayment($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = 'approved';
        $pembayaran->save();

        // Ambil transaksi terkait pembayaran
        $transaksi = Transaksi::findOrFail($pembayaran->id_transaksi);

        // Ambil semua item yang ada dalam transaksi
        $cartItems = CartItem::where('transaksi_id', $transaksi->id)->get();

        // Debugging: cek apakah ada item dalam transaksi
        if ($cartItems->isEmpty()) {
            \Log::error("CartItem kosong untuk transaksi_id: " . $transaksi->id);
            return redirect()->route('admin.payments')->with('error', 'Tidak ada item dalam transaksi ini!');
        }

        foreach ($cartItems as $item) {
            $produk = Produk::find($item->produk_id);

            if ($produk) {
                $produk->stok -= $item->quantity;
                $produk->save();
            } else {
                return redirect()->route('admin.payments')->with('error', 'Produk tidak ditemukan!');
            }
        }

        return redirect()->route('admin.payments')->with('success', 'Payment approved and stock updated successfully!');
    }


        public function payments()
{
    $payments = Pembayaran::where('status', 'pending')->get();
    return view('admin.payments', compact('payments'));
}
}
