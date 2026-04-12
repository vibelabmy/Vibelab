<?php

namespace App\Http\Controllers;
import Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
