<?php
use Illuminate\Support\Facades\Log;
use Barryvdh\TranslationManager\Models\Translation;
use App\Models\Page;
use App\Models\Review;
function get_settings($name)
{
    $cache_in_seconds = env('CACHE_TIME');
    $value = cache('settings');
    $customer_settings = cache('customer_settings');
    $seller_settings = cache('seller_settings');
    if ($name == 'app_section' || $name == 'app_logo' || $name =='contact_info') {
        $host = \Illuminate\Support\Facades\Request::getHost();
        $cacheDomain = cache('domain_data_'.$host);
    }

    if (!$value) {
        if (\Schema::hasTable('settings')) {
            $settings = \App\Models\Settings::where('admin_id', 1)->get();
            $sortSettings = [];
            foreach ($settings as $setting) {
                $sortSettings[$setting->name] = $setting->value;
            }
            cache()->remember('settings', 10800, function () use ($sortSettings) {
                return $sortSettings;
            });
        }
    } else {
        $sortSettings = $value;
    }

    return isset($sortSettings[$name]) ? $sortSettings[$name] : '';
}
function get_pages($position)
{

    $pages = cache('pages');

    if (!$pages) {
        $pages = Page::where('status', 'published')->orderBy('created_at', 'desc')->get();

        $sortSettings = [];
        foreach ($pages as $page) {
            $sortSettings[$page->position][] = $page;
        }
        cache()->remember('pages', 10800, function () use ($sortSettings) {
            return $sortSettings;
        });
    } else {
        $sortSettings = $pages;
    }

    return isset($sortSettings[$position]) ? $sortSettings[$position] : [];
}

function isSidebarActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';

}
function isSidebarTrue($routeNames)
{
    $istrue = false;
    foreach ($routeNames as $routeName){
        if (request()->routeIs($routeName)){
            $istrue = true;
            break;
        }
    }
    return $istrue;

}

function generateUniqueString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $shuffledCharacters = str_shuffle($characters);
    $uniqueString = substr($shuffledCharacters, 0, 10);
    return $uniqueString;
}

if (!function_exists('product_rating')) {
    function product_rating($productId) {
        $reviews = Review::where('product_id', $productId)->get();

        if ($reviews->isEmpty()) {
            return 0; // or return null if you prefer
        }

        $averageRating = $reviews->avg('rating');
        $roundedRating = round($averageRating * 2) / 2;
        return $roundedRating;
    }
}
function generate_stars($rating) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars >= 0.5) ? true : false;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

    $starsHtml = '';

    // Add full stars
    for ($i = 0; $i < $fullStars; $i++) {
        $starsHtml .= '<i class="fas fa-star star-icon"></i>';
    }

    // Add half star
    if ($halfStar) {
        $starsHtml .= '<i class="fas fa-star-half-alt star-icon"></i>';
    }

    // Add empty stars
    for ($i = 0; $i < $emptyStars; $i++) {
        $starsHtml .= '<i class="far fa-star star-icon"></i>';
    }

    return $starsHtml;
}

