<?php

namespace App\Http\Controllers\frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Service;
use App\Models\BlogList;
use App\Models\Category;
use App\Models\FeedBack;
use App\Mail\ContactMail;
use App\Models\SkillItem;
use App\Models\BlogHeader;
use App\Models\Experience;
use App\Models\FooterHelp;
use App\Models\FooterInfo;
use App\Models\TyperTitle;
use App\Models\FooterUseful;
use Illuminate\Http\Request;
use App\Models\FooterContact;
use App\Models\PortfolioItem;
use App\Models\ContactHeading;
use App\Models\FeedBackSetting;
use App\Models\PortfolioSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home_hero()
    {
        $hero = Hero::first();
        $typer_title = TyperTitle::get();

        $service = Service::get();

        $about = About::first();

        $portfolioSetting = PortfolioSetting::first();
        $portfolio_category = Category::get();
        $portfolioItem = PortfolioItem::get();
        $skill = Skill::first();
        $skillItem = SkillItem::get();
        $experience = Experience::first();
        $feedback = FeedBack::get();
        $FeedBackSetting = FeedBackSetting::first();
        $blogs = BlogList::latest()->take(5)->get();
        $blogsheader = BlogHeader::first();
        $ContactHeading = ContactHeading::first();
        $social = Social::get();
        $footerInfo = FooterInfo::first();
        $footerContact = FooterContact::first();
        $FooterUseful = FooterUseful::get();
        $help = FooterHelp::get();

        return view(
            'frontend.home',
            compact(
                'hero',
                'typer_title',
                'service',
                'about',
                'portfolioSetting',
                'portfolio_category',
                'portfolioItem',
                'skill',
                'skillItem',
                'experience',
                'feedback',
                'FeedBackSetting',
                'blogs',
                'blogsheader',
                'ContactHeading',
                'footerInfo',
                'social',
                'footerContact',
                'FooterUseful',
                'help',
            )
        );
    }

    public function portfolioDetails($id)
    {
        $social = Social::get();
        $footerInfo = FooterInfo::first();
        $footerContact = FooterContact::first();
        $FooterUseful = FooterUseful::get();
        $help = FooterHelp::get();
        $portfolioDetails = PortfolioItem::findOrFail($id);
        return view('frontend.single-portfolio', compact('portfolioDetails','footerInfo',
        'social',
        'footerContact',
        'FooterUseful',
        'help'));
    }

    public function singleBlog($id)
    {
        $social = Social::get();
        $footerInfo = FooterInfo::first();
        $footerContact = FooterContact::first();
        $FooterUseful = FooterUseful::get();
        $help = FooterHelp::get();
        $singleBlog = BlogList::findOrFail($id);
        $oldPost = BlogList::where('id', '<', $singleBlog->id)->orderBy('id', 'desc')->first();
        $newPost = BlogList::where('id', '>', $singleBlog->id)->orderBy('id', 'asc')->first();
        return view('frontend.single-blog', compact('singleBlog', 'oldPost', 'newPost','footerInfo',
        'social',
        'footerContact',
        'FooterUseful',
        'help'));
    }

    public function blog()
    {
        $social = Social::get();
        $footerInfo = FooterInfo::first();
        $footerContact = FooterContact::first();
        $FooterUseful = FooterUseful::get();
        $help = FooterHelp::get();
        $blog = BlogList::latest()->paginate(2);
        return view('frontend.blog', compact(
            'blog',
            'footerInfo',
            'social',
            'footerContact',
            'FooterUseful',
            'help'
        ));
    }

    public function contact(Request $request)
    {
        //   Contact::create($request->input());
        Mail::send(new ContactMail($request->all()));

        return response()->json([
            'status' => 'success',
            'message' => 'Request successfull'
        ], 200);
    }



}


