<?php

namespace App\Controllers\Admin;

use App\Models\Payment;
use Core\View;

class PaymentController {
    
    public function index () {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $payments = Payment::getRecent($limit, $page,$search);
        $total = Payment::count($search);

        return View::render(
            template: "/admin/payments/payments",
            data: [
                'payments' => $payments,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total/$limit)
            ],
            layout: "layouts/admin"
        );
    }

    public function show(int $id){
        $payment = Payment::find($id);
        // var_dump($payment);die();
        return View::render(
            template: '/admin/payments/show',
            data : [
                'payment' => $payment
            ],
            layout: 'layouts/admin'
        );
    }
}