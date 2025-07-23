<?php

namespace App\Controllers;

use Core\View;

class CompanyController {
    public function about() {
        return View::render(
            template: "company/about-us",
            layout: 'layouts/main'
        );
    }

    public function privacy() {
        return View::render(
            template: "company/privacy",
            layout: "layouts/main"
        );
    }

    public function licensing() {
        return View::render(
            template: "company/licensing",
            layout: "layouts/main"
        );
    }

    public function faq() {
        return View::render(
            template: "company/faq",
            layout: "layouts/main"
        );
    }
}