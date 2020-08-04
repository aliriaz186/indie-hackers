<?php

namespace App\Http\Controllers;

use App\BusinessModelTable;
use App\FundingModel;
use App\PlatformTable;
use App\Product;
use App\ProductDetailTable;
use App\TagTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function newProduct()
    {
        if (empty(Session::get('userId'))) {
            return redirect('/login');
        }
        return view('dashboard.new-product');
    }

    public function getProfileAndProducts(Request $request)
    {
        $user = User::where('id', Session::get('userId'))->first();
        $products = Product::where(['user_id' => Session::get('userId')])->orderBy('id', 'DESC')->get();
        return view('dashboard.profile')->with(['user' => $user, 'products' => $products]);
    }

    public function saveProductInfo(Request $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->url = $request->url;
            $product->user_id = Session::get('userId');
            $result = $product->save();
            return json_encode(['status' => $result]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function createProduct(Request $request)
    {
        try {
            $product = new Product();
            $product->id_kit = $request->id_kit;
            $product->url_kit = $request->url_kit;
            $result = $product->save();
            return json_encode(['status' => $result, 'id' => $product->id]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function deleteProduct(Request $request)
    {
        try {
            $result = Product::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first()->delete();
            return json_encode(['status' => $result]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function saveFile(Request $request)
    {
        try {
            $product = Product::where(['url_kit' => $request->url_kit, 'id' => $request->id])->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/kits/' . $request->url_kit . '/products/', $name);
                if (!empty($product->logo)) {
                    if (File::exists(public_path() . '/kits/' . $request->url_kit . '/products/' . $product->logo)) {
                        File::delete(public_path() . '/kits/' . $request->url_kit . '/products/' . $product->logo);
                    }
                }
                $product->logo = $name;
            }
            $product->update();
            return json_encode(['status' => true]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function editProductInfo($productId)
    {
        $products = Product::where('id', $productId)->first();
        if (ProductDetailTable::where('product_id', $productId)->exists()) {
            $logo = ProductDetailTable::where('product_id', $productId)->first()['logo'];
            $productDetails = ProductDetailTable::where('product_id', $productId)->first();
        } else {
            $logo = '';
            $productDetails = '';
        }
        return view('dashboard.edit-product')->with(['products' => $products, 'productId' => $productId, 'logo' => $logo, 'productDetails' => $productDetails]);
    }

    public function detailProductInfo($productId)
    {
        $products = Product::where('id', $productId)->first();
        if (ProductDetailTable::where('product_id', $productId)->exists()) {
            $logo = ProductDetailTable::where('product_id', $productId)->first()['logo'];
            $productDetails = ProductDetailTable::where('product_id', $productId)->first();
        } else {
            $logo = '';
            $productDetails = '';
        }
        return view('dashboard.details-product')->with(['products' => $products, 'productId' => $productId, 'logo' => $logo, 'productDetails' => $productDetails]);
    }

    public function updateLogo(Request $request)
    {
        if (ProductDetailTable::where('product_id', $request->productId)->exists()) {
            $productDetails = ProductDetailTable::where('product_id', $request->productId)->first();
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/product-logo/', $name);
                if (!empty($productDetails->logo)) {
                    if (File::exists(public_path() . '/product-logo/' . $productDetails->logo)) {
                        File::delete(public_path() . '/product-logo/' . $productDetails->logo);
                    }
                }
                $productDetails->logo = $name;
            }
            $productDetails->update();
            return json_encode(['status' => true]);
        } else {
            $productDetails = new ProductDetailTable();
            $productDetails->product_id = $request->productId;
            if ($request->hasfile('files')) {
                $file = $request->file('files')[0];
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/product-logo/', $name);
                if (!empty($productDetails->logo)) {
                    if (File::exists(public_path() . '/product-logo/' . $productDetails->logo)) {
                        File::delete(public_path() . '/product-logo/' . $productDetails->logo);
                    }
                }
                $productDetails->logo = $name;
            }
            $productDetails->save();
            return json_encode(['status' => true]);
        }
    }

    public function saveProductDetails(Request $request)
    {
        if (ProductDetailTable::where('product_id', $request->productId)->exists()) {
            $productDetails = ProductDetailTable::where('product_id', $request->productId)->first();
            $productDetails->name = $request->name;
            $productDetails->tagline = $request->tagline;
            $productDetails->motivation = $request->motivation;
            $productDetails->web_link = $request->webLink;
            $productDetails->twitter = $request->twitterLink;
            $productDetails->facebook = $request->facebookLink;
            $productDetails->start_date_month = $request->startMonth;
            $productDetails->start_date_year = $request->startYear;
            $productDetails->end_date_month = $request->endMonth;
            $productDetails->end_date_year = $request->endYear;
            $productDetails->location = $request->location;
            $productDetails->update();
            $tagsArray = json_decode($request->myTags, true);
            $platformArray = json_decode($request->myPlatforms, true);
            $fundingArray = json_decode($request->funding, true);
            $businessArray = json_decode($request->businessArray, true);
            $tags = [];
            $platforms = [];
            $funding = [];
            $business = [];
            foreach ($tagsArray as $tagsData) {
                array_push($tags, [
                    "product_id" => $request->productId,
                    "tag" => $tagsData
                ]);
            }
            $inserted = TagTable::insert($tags);

            foreach ($platformArray as $platformsData) {
                array_push($platforms, [
                    "product_id" => $request->productId,
                    "platform" => $platformsData
                ]);
            }
            $platformInserted = PlatformTable::insert($platforms);

            foreach ($fundingArray as $fundingData) {
                array_push($funding, [
                    "product_id" => $request->productId,
                    "funding" => $fundingData
                ]);
            }
            $fundingInserted = FundingModel::insert($funding);

            foreach ($businessArray as $businessData) {
                array_push($business, [
                    "product_id" => $request->productId,
                    "business_model" => $businessData
                ]);
            }
            $businessInserted = BusinessModelTable::insert($business);
            return json_encode(['status' => true]);
        } else {
            $productDetails = new ProductDetailTable();
            $productDetails->name = $request->name;
            $productDetails->tagline = $request->tagline;
            $productDetails->motivation = $request->motivation;
            $productDetails->web_link = $request->webLink;
            $productDetails->twitter = $request->twitterLink;
            $productDetails->facebook = $request->facebookLink;
            $productDetails->start_date_month = $request->startMonth;
            $productDetails->start_date_year = $request->startYear;
            $productDetails->end_date_month = $request->endMonth;
            $productDetails->end_date_year = $request->endYear;
            $productDetails->location = $request->location;
            $productDetails->save();
            return json_encode(['status' => true]);
        }
    }

    public function getTags(int $productId)
    {
        $tagsData = TagTable::where('product_id', $productId)->get();
        return json_encode($tagsData);
    }

    public function getPlatforms(int $productId)
    {
        $platformData = PlatformTable::where('product_id', $productId)->get();
        return json_encode($platformData);
    }

    public function getFunding(int $productId)
    {
        $fundingData = FundingModel::where('product_id', $productId)->get();
        return json_encode($fundingData);
    }

    public function getBusiness(int $productId)
    {
        $businessData = BusinessModelTable::where('product_id', $productId)->get();
        return json_encode($businessData);
    }
}
