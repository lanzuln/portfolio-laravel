<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BlogList;
use App\Models\FeedBack;
use App\Models\SkillItem;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboardPage(){

        $blogCount=BlogList::count();
        $skillCount=SkillItem::count();
        $portfolioCount=PortfolioItem::count();
        $FeedBackCount=FeedBack::count();
        return view('admin.dashboard',compact('blogCount','skillCount','portfolioCount','FeedBackCount'));
    }

}
