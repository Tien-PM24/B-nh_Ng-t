<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\products;
use App\Models\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
//     public function getIndex(){			
//     	return view('page.trangchu');		
//     }
//     public function getLoaiSP(){			
//     	return view('page.loai_sanpham');		
//     }
//     public function getChitiet(){			
//         return view('page.chitiet_sanpham');			
//         }			
                    
//     public function marter(){			
//             return view('master');			
//             }	
//     public function if(){			
//                 return view('if');			
//                 }	
//     public function for(){			
//             return view('vonglapfor');			
//     }				
//     public function lienhe(){			
//         return view('page.lienhe');			
// }    
//     public function about(){			
//     return view('page.about');			
//     }      
    public function getIndex(){							
        // $slide =Slide::all();						
    	//return view('page.trangchu',['slide'=>$slide]);						
        $new_product = products::where('new',1)->paginate(8);
        $sanpham_khuyenmai = products::where('promotion_price','<>',0)->paginate(4);						
        //dd($new_product);							
    	return view('page.trangchu',compact('new_product','sanpham_khuyenmai'));						
    }							
    						
    public function getDetail(Request $request){							
    	$sanpham = products:: where('id',$request->id)->first();
        $splienquan = products::where('id','<>',$sanpham->id,'and','id_type','=',$sanpham->id_type)->paginate(3);						
        $comments =	comments::where('id_product',$request->id)->get();					
    	return view('page.chitiet_sanpham',compact('sanpham','splienquan','comments'));						
    }		  
    
}
