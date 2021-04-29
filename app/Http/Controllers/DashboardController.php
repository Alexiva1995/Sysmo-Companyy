<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  // Dashboard - Analytics
  public function dashboardAnalytics()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }

    // Home
    public function home()
    {
      $pageConfigs = ['pageHeader' => false];
  
      return view('/content/pages/page-home', ['pageConfigs' => $pageConfigs]);
    }

  // Dashboard - Ecommerce
  // public function dashboardEcommerce()
  // {
  //   $pageConfigs = ['pageHeader' => false];

  //   return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
  // }
}
