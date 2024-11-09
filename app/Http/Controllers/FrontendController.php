<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function service($slug)
    {
    
    $service = Service::where('slug',$slug)->first();
    $study = CaseStudy::where('slug',$slug)->first();
    $article = Article::where('slug',$slug)->first();

    if($service)

    {
      $more_services = json_decode($service->more_service_items);
      $industries = json_decode($service->industry_items);

      $service_list_data = json_decode($service->service_list_contents);
  
      $process_flow_contents = json_decode($service->process_flow_contents);
      $why_choose_contents = json_decode($service->why_choose_contents);
      $article_contents = json_decode($service->article_contents);
      $client_success_stories = json_decode($service->client_success_stories);
      $faq_data = json_decode($service->faqs);
      $tech_images = json_decode($service->tech_images);
      // dd($service_list_data);
      $additional_services_contents = json_decode($service->additional_services_contents);
      $outsource_dynamic = json_decode($service->outsource_dynamic);
      // dd($additional_services_contents);

      return view('service',compact('client_success_stories','tech_images','faq_data','service','service_list_data','process_flow_contents','why_choose_contents','article_contents','additional_services_contents','more_services','industries','outsource_dynamic'));
       
    }elseif($study)
   {
      return view('case-study',compact('study'));

   } elseif($article)
   {
      $faq_data = json_decode($article->faqs);
      return view('article',compact('article','faq_data'));

   } 
     
 
      
    }
}
