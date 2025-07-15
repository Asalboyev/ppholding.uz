<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationsController extends Controller
{
  public function index() {
    $applications = Application::orderBy('id', 'desc')->paginate(10);
    return view('app.applications.index', [
      'applications' => $applications
    ]);
  }

  public function destroy($id) {
    Application::find($id)->delete();

    return back()->with(['message' => 'Successfully deleted!']);
  }
}
