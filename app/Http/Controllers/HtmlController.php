<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function saveHtml(Request $request)
    {
        $htmlContent = $request->input('htmlContent');

        $slug = $request->input('slug');

        $service = Service::where('slug', $slug)->first();

        $path = '';
        $mainpath = '';
        if (!empty($service)) {
            if (!empty($service->service_slug)) {
                $serviceSlug = ServiceList::where('id', $service->service_slug)->pluck('slug')->first();
                $path .= '/' . $serviceSlug;
                $mainpath .= '/' . $serviceSlug;
            }

            if (!empty($service['sub_service_slug'])) {
                $path .= '/' . $service['sub_service_slug'];
            }

            if (!empty($service['sub_sub_service_slug'])) {
                $path .= '/' . $service['sub_sub_service_slug'];
            }
        }


        $replacements = [
            '<meta name="php1">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/cdn-check.php"; // Change CDN path according to Local and Online ?>',
            '<meta name="php2">' => '<?php include $_SERVER["DOCUMENT_ROOT"] . "/includes/head-content-f20.php"; ?>',
            '<meta name="php3">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header-f20.php"; ?>',
            '<meta name="php4">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/cc-sub-header-f20.php"; ?>',
            '<meta name="php5">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/small-form-inner-page.php"; ?>',
            'php6' => '<?php echo $BreadcrumbCPL; ?>',
            'php7' => '<?php echo $FWS_Founded_2004_Years; ?>',
            'php8' => '<?php echo $tagpath; ?>',
            'php9' => '<?php echo $GAPageLevelVar; ?>',
            '<meta name="php10">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/cc-btm-section-f20.php"; ?>',
            '<meta name="php11">' => '<?php include $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-contact.php"; ?>',
            '<meta name="php12">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-f20.php"; ?>',
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>' => '',
            '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>' => '',
            '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">' => '',
        ];

        $htmlContent = strtr($htmlContent, $replacements);

        $htmlContent = $this->remove_between_strings($htmlContent, '<script>//script-start', '//script-end</script>');
        


        // Path to store the HTML files
        $directoryPath = $_SERVER['DOCUMENT_ROOT'] . $path;
       

        // Create directory if it doesn't exist
        if (!is_dir($directoryPath)) {
    
            mkdir($directoryPath, 0755, true);
        }else{
          
        }

        // Create the file path
        $fileName = $slug . '.php';
        $filePath = $directoryPath . '/' . $fileName;
        
         // Delete the file if it exists
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Save HTML content to file
        if (file_put_contents($filePath, $htmlContent)) {
            
            
        //     // Copy the banner image
        // $sourceImagePath = public_path('storage/banner_images/' . $service->banner_image);
        // $destinationImagePath = $directoryPath . '/banner_images/' . $service->banner_image;

        // // Create the banner_images directory if it doesn't exist
        // if (!is_dir($directoryPath . '/banner_images')) {
        //     mkdir($directoryPath . '/banner_images', 0755, true);
        // }

        // // Copy the image if it exists
        // if (file_exists($sourceImagePath)) {
        //     copy($sourceImagePath, $destinationImagePath);
        // }
        
        // if($service->feature_image)
        // {
        //     // Copy the feature image
        //     $sourceImagePath = public_path('storage/feature_images/' . $service->feature_image);
        //     $destinationImagePath = $directoryPath . '/feature_images/' . $service->feature_image;
    
        //     // Create the feature_images directory if it doesn't exist
        //     if (!is_dir($directoryPath . '/feature_images')) {
        //         mkdir($directoryPath . '/feature_images', 0755, true);
        //     }
    
        //     // Copy the image if it exists
        //     if (file_exists($sourceImagePath)) {
        //         copy($sourceImagePath, $destinationImagePath);
        //     }
        // }
        
        
        //   // Copy images from service_list_data
        // $serviceListData = json_decode($service->service_list_contents);
        // if (isset($serviceListData) && count($serviceListData) > 0) {
        //     foreach ($serviceListData as $s) {
        //         if (isset($s->image)) {
  
        //             $sourceImagePath = public_path($s->image);
        //             $destinationImagePath = $directoryPath . '/service_list_item_images/' . basename($s->image);

        //           // Create the service_list_item_images directory if it doesn't exist
        //             if (!is_dir($directoryPath . '/service_list_item_images')) {
        //                 mkdir($directoryPath . '/service_list_item_images', 0755, true);
        //             }
        //             // Copy the image if it exists
        //             if (file_exists($sourceImagePath)) {
        //                 copy($sourceImagePath, $destinationImagePath);
        //             }
        //         }
        //     }
        // }
        
        // // Copy images from article_contents
        // $articleContents = json_decode($service->article_contents);
        // if (isset($articleContents) && count($articleContents) > 0) {
        //     foreach ($articleContents as $item) {
        //         if (isset($item->image)) {
        //             $sourceImagePath = public_path($item->image);
        //             $destinationImagePath = $directoryPath . '/article_item_images/' . basename($item->image);
        
        //           // Create the service_list_item_images directory if it doesn't exist
        //             if (!is_dir($directoryPath . '/article_item_images')) {
        //                 mkdir($directoryPath . '/article_item_images', 0755, true);
        //             }
                    
            
        //             // Copy the image if it exists
        //             if (file_exists($sourceImagePath)) {
        //                 copy($sourceImagePath, $destinationImagePath);
        //             }
        //         }
        //     }
        // }
        
        // // Copy images from tech_images
        // $techImages = json_decode($service->tech_images);
        // if (isset($techImages) && count($techImages) > 0) {
        //     foreach ($techImages as $image) {
        //         $sourceImagePath = public_path('storage/tech_images/' . $image);
        //         $destinationImagePath = $directoryPath . '/tech_images/' . $image;
        
        //         // Create the tech_images directory if it doesn't exist
        //         if (!is_dir($directoryPath . '/tech_images')) {
        //             mkdir($directoryPath . '/tech_images', 0755, true);
        //         }
        
        //         // Copy the image if it exists
        //         if (file_exists($sourceImagePath)) {
        //             copy($sourceImagePath, $destinationImagePath);
        //         }
        //     }
        // }
        
        unset($directoryPath);
        $directoryPath = $_SERVER['DOCUMENT_ROOT'] . $mainpath;
       

        // Create the images directory if it doesn't exist
        $imagesDirectory = $directoryPath . '/images';
        if (!is_dir($imagesDirectory)) {
            mkdir($imagesDirectory, 0755, true);
        }
        
        // Copy the banner image
        $sourceImagePath = public_path('storage/banner_images/' . $service->banner_image);
        $destinationImagePath = $imagesDirectory . '/' . $service->banner_image;
        
        // Copy the image if it exists
        if (file_exists($sourceImagePath)) {
            copy($sourceImagePath, $destinationImagePath);
        }
        
        if ($service->feature_image) {
            // Copy the feature image
            $sourceImagePath = public_path('storage/feature_images/' . $service->feature_image);
            $destinationImagePath = $imagesDirectory . '/' . $service->feature_image;
        
            // Copy the image if it exists
            if (file_exists($sourceImagePath)) {
                copy($sourceImagePath, $destinationImagePath);
            }
        }
        
        // Copy images from service_list_data
        $serviceListData = json_decode($service->service_list_contents);
        if (isset($serviceListData) && count($serviceListData) > 0) {
            foreach ($serviceListData as $s) {
                if (isset($s->image)) {
                    $sourceImagePath = public_path($s->image);
                    $destinationImagePath = $imagesDirectory . '/' . basename($s->image);
        
                    // Copy the image if it exists
                    if (file_exists($sourceImagePath)) {
                        copy($sourceImagePath, $destinationImagePath);
                    }
                }
            }
        }
        
        // Copy images from article_contents
        $articleContents = json_decode($service->article_contents);
        if (isset($articleContents) && count($articleContents) > 0) {
            foreach ($articleContents as $item) {
                if (isset($item->image)) {
                    $sourceImagePath = public_path($item->image);
                    $destinationImagePath = $imagesDirectory . '/' . basename($item->image);
        
                    // Copy the image if it exists
                    if (file_exists($sourceImagePath)) {
                        copy($sourceImagePath, $destinationImagePath);
                    }
                }
            }
        }
        
        // Copy images from tech_images
        $techImages = json_decode($service->tech_images);
        if (isset($techImages) && count($techImages) > 0) {
            foreach ($techImages as $image) {
                $sourceImagePath = public_path('storage/tech_images/' . $image);
                $destinationImagePath = $imagesDirectory . '/' . $image;
        
                // Copy the image if it exists
                if (file_exists($sourceImagePath)) {
                    copy($sourceImagePath, $destinationImagePath);
                }
            }
        }



        
            return response()->json(['message' => 'HTML content received and processed successfully']);
        } else {
            return response()->json(['error' => 'Failed to save HTML content to file.']);
        }
    }

    public function saveHtmlCaseStudy(Request $request)
    {
        $htmlContent = $request->input('htmlContent');

        $slug = $request->input('slug');

        $path = '';
        $service = CaseStudy::where('slug', $slug)->first();
        if (!empty($service)) {
            if (!empty($service->service_slug)) {
                $serviceSlug = ServiceList::where('id', $service->service_slug)->pluck('slug')->first();
                $path .= '/' . $serviceSlug;
            }

            if (!empty($service['sub_service_slug'])) {
                $path .= '/' . $service['sub_service_slug'];
            }

            if (!empty($service['sub_sub_service_slug'])) {
                $path .= '/' . $service['sub_sub_service_slug'];
            }
        }

        $replacements = [
            '<meta name="php1">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"]."/includes/cdn-check.php"; ?>',
            '<meta name="php2">' => '<?php include $_SERVER["DOCUMENT_ROOT"] . "/includes/head-content-f20.php"; ?>',
            '<meta name="php3">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header-f20.php"; ?>',
            '<meta name="php4">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/cc-sub-header-f20.php"; ?>',
            '<meta name="php5">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/small-form-inner-page.php"; ?>',
            'php6' => '<?php echo $BreadcrumbCPL; ?>',
            'php7' => '<?php echo $tagpath; ?>',
            'php8' => '<?php echo $GAPageLevelVar; ?>',
            '<meta name="php10">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/es-btm-section-f20.php"; ?>',
            '<meta name="php11">' => '  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-contact.php"; ?>',
            '<meta name="php12">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-f20.php"; ?>',
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>' => '',
            '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>' => '',
            '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">' => '',
        ];

        $htmlContent = strtr($htmlContent, $replacements);


        $htmlContent = $this->remove_between_strings($htmlContent, '<script>//script-start', '//script-end</script>');

        // Path to store the HTML files
        $directoryPath = $_SERVER['DOCUMENT_ROOT'] . $path;

        // Create directory if it doesn't exist
        if (!is_dir($directoryPath)) {
    
            mkdir($directoryPath, 0755, true);
        }

        // Create the file path
        $fileName = $slug . '.php';
        $filePath = $directoryPath . '/' . $fileName;
        
     

        // Save HTML content to file
        if (file_put_contents($filePath, $htmlContent)) {
            
            // Copy the banner image
        $sourceImagePath = public_path('storage/banner_images/' . $service->banner_image);
        $destinationImagePath = $directoryPath . '/banner_images/' . $service->banner_image;

        // Create the banner_images directory if it doesn't exist
        if (!is_dir($directoryPath . '/banner_images')) {
            mkdir($directoryPath . '/banner_images', 0755, true);
        }

        // Copy the image if it exists
        if (file_exists($sourceImagePath)) {
            copy($sourceImagePath, $destinationImagePath);
        }
        
         if($service->feature_image)
        {
            // Copy the feature image
            $sourceImagePath = public_path('storage/feature_images/' . $service->feature_image);
            $destinationImagePath = $directoryPath . '/feature_images/' . $service->feature_image;
    
            // Create the feature_images directory if it doesn't exist
            if (!is_dir($directoryPath . '/feature_images')) {
                mkdir($directoryPath . '/feature_images', 0755, true);
            }

            // Copy the image if it exists
            if (file_exists($sourceImagePath)) {
                copy($sourceImagePath, $destinationImagePath);
            }
        }
        
        
            return response()->json(['message' => 'HTML content received and processed successfully']);
        } else {
            return response()->json(['error' => 'Failed to save HTML content to file.']);
        }
    }

    public function saveHtmlArticle(Request $request)
    {
        $htmlContent = $request->input('htmlContent');

        $slug = $request->input('slug');

        $service = Article::where('slug', $slug)->first();

        $path = '';
        if (!empty($service)) {
            if (!empty($service->service_slug)) {
                $serviceSlug = ServiceList::where('id', $service->service_slug)->pluck('slug')->first();
                $path .= '/' . $serviceSlug;
            }

            if (!empty($service['sub_service_slug'])) {
                $path .= '/' . $service['sub_service_slug'];
            }

            if (!empty($service['sub_sub_service_slug'])) {
                $path .= '/' . $service['sub_sub_service_slug'];
            }
        }

        $replacements = [
            '<meta name="php1">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"]."/includes/cdn-check.php"; ?>',
            '<meta name="php2">' => '<?php include $_SERVER["DOCUMENT_ROOT"] . "/includes/head-content-f20.php"; ?>',
            '<meta name="php3">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header-f20.php"; ?>',
            '<meta name="php4">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/cc-sub-header-f20.php"; ?>',
            '<meta name="php5">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/small-form-inner-page.php"; ?>',
            'php6' => '<?php echo $BreadcrumbCPL; ?>',
            'php7' => '<?php echo $tagpath; ?>',
            'php8' => '<?php echo $GAPageLevelVar; ?>',
            '<meta name="php10">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/es-btm-section-f20.php"; ?>',
            '<meta name="php11">' => '  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-contact.php"; ?>',
            '<meta name="php12">' => '<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer-f20.php"; ?>',
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>' => '',
            '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>' => '',
            '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">' => '',
            'php9' => '<?php echo $cdn_path; ?>',
        ];

        $htmlContent = strtr($htmlContent, $replacements);
        
        $htmlContent = $this->remove_between_strings($htmlContent, '<script>//script-start', '//script-end</script>');


        // Path to store the HTML files
        $directoryPath = $_SERVER['DOCUMENT_ROOT'] . $path;

        // Create directory if it doesn't exist
        if (!is_dir($directoryPath)) {
    
            mkdir($directoryPath, 0755, true);
        }
        
        

        // Create the file path
        $fileName = $slug . '.php';
        $filePath = $directoryPath . '/' . $fileName;
        
     

        // Save HTML content to file
        if (file_put_contents($filePath, $htmlContent)) {
            
                   // Copy the banner image
        $sourceImagePath = public_path('storage/banner_images/' . $service->banner_image);
        $destinationImagePath = $directoryPath . '/banner_images/' . $service->banner_image;

        // Create the banner_images directory if it doesn't exist
        if (!is_dir($directoryPath . '/banner_images')) {
            mkdir($directoryPath . '/banner_images', 0755, true);
        }

        // Copy the image if it exists
        if (file_exists($sourceImagePath)) {
            copy($sourceImagePath, $destinationImagePath);
        }
        
         if($service->feature_image)
        {
            // Copy the feature image
            $sourceImagePath = public_path('storage/feature_images/' . $service->feature_image);
            $destinationImagePath = $directoryPath . '/feature_images/' . $service->feature_image;
    
            // Create the feature_images directory if it doesn't exist
            if (!is_dir($directoryPath . '/feature_images')) {
                mkdir($directoryPath . '/feature_images', 0755, true);
            }

            // Copy the image if it exists
            if (file_exists($sourceImagePath)) {
                copy($sourceImagePath, $destinationImagePath);
            }
        }
        
        
            return response()->json(['message' => 'HTML content received and processed successfully']);
        } else {
            return response()->json(['error' => 'Failed to save HTML content to file.']);
        }
    }

    protected function remove_between_strings($original_str, $start_str, $end_str)
    {
        $start_index = strpos($original_str, $start_str);
        $end_index = strpos($original_str, $end_str);

        // Check if both start and end strings exist in the original string
        if ($start_index !== false && $end_index !== false) {
            // Remove the content between start_str and end_str
            $modified_str = substr($original_str, 0, $start_index) . substr($original_str, $end_index + strlen($end_str));
            return $modified_str;
        } else {
            // Handle case where either start or end string is not found
            return $original_str;
        }
    }


}
