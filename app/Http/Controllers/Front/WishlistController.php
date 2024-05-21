<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\WishlistInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function __construct(WishlistInterface $wishlistRepository) 
    {
        $this->wishlistRepository = $wishlistRepository;
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    public function add(Request $request , $productId) 
    {
        if(Auth::guard('web')->check()){
            $wishlistStore = $this->wishlistRepository->addToWishlist($productId);
            if ($wishlistStore) {
                return redirect()->back()->with('success', 'successfully added');
            } else {
                // return response()->json(['status' => 400, 'message' => 'Something happened']);
                return redirect()->back()->with('failure', 'Something happened');
            }
        }else{
            return redirect()->route('front.user.login');
        }
        
    }
    public function viewByUserId(Request $request) 
    {
        if(Auth::guard('web')->check()){
            $data = $this->wishlistRepository->userWishList(); 
            return view('front.wishlist',compact('data'));

        }else{
            return redirect()->route('front.user.login');
        }
        
    }

	public function remove(Request $request) 
    {
        $request->validate([
            "product_id" => "required|integer",
        ]);

        $params = $request->except('_token');

        $wishlistStore = $this->wishlistRepository->addToWishlist($params);

        if ($wishlistStore) {
            // return response()->json(['status' => 200, 'message' => $wishlistStore]);
            return redirect()->back()->with('success', 'Product removed from wishlist');
        } else {
            // return response()->json(['status' => 400, 'message' => 'Something happened']);
            return redirect()->back()->with('failure', 'Something happened');
        }
    }
}
