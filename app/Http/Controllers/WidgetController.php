<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\H_F_Wiget;
use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function home_setting(){
        return view('admin.pages.widget.home-setting',[
            'homeSetting' => Widget::where('id',1)->first(),
            'categories'=>Category::where('status', 1)->get()
        ]);
    }

    public function save_advertisement(Request $request){
        Widget::saveAbertisement($request);
        return back();
    }

    public function save_advertisement_status($id){
        // Find the Widget instance with the specified ID
        $advertisement = Widget::find($id);

        // Check the current value of advertisementStatus and toggle it
        if ($advertisement->advertisementStatus == 1){
            $advertisement->advertisementStatus = 0;
        } else {
            $advertisement->advertisementStatus = 1;
        }

        // Save the updated instance with the toggled advertisementStatus
        $advertisement->save();

        // Redirect back to the previous page
        return back();
    }



    public function save_first(Request $request){
        Widget::saveFirst($request);
        return back();
    }

    public function save_first_status($id){
        $category1 = Widget::find($id);
        if ($category1->firstStatus == 1){
            $category1->firstStatus = 0;
        }else{
            $category1->firstStatus = 1;
        }
        $category1->save();
        return back();
    }


    public function save_second(Request $request){
        Widget::saveSecond($request);
        return back();
    }

    public function save_second_status($id){
        $category2 = Widget::find($id);
        if ($category2->secondStatus == 1){
            $category2->secondStatus = 0;
        }else{
            $category2->secondStatus = 1;
        }
        $category2->save();
        return back();
    }


    public function save_third(Request $request){
        Widget::saveThird($request);
        return back();
    }

    public function save_third_status($id){
        $category3 = Widget::find($id);
        if ($category3->thirdStatus == 1){
            $category3->thirdStatus = 0;
        }else{
            $category3->thirdStatus = 1;
        }
        $category3->save();
        return back();
    }


    public function save_four(Request $request){
        Widget::saveFour($request);
        return back();
    }

    public function save_four_status($id){
        $category4 = Widget::find($id);
        if ($category4->fourStatus == 1){
            $category4->fourStatus = 0;
        }else{
            $category4->fourStatus = 1;
        }
        $category4->save();
        return back();
    }



    public function header_setting(){
        return view('admin.pages.widget.header-setting',[
            'header_setting' => H_F_Wiget::find(1)->first(),
        ]);
    }

    public function update_header_content(Request $request){
        H_F_Wiget::saveHeaderContent($request);
        return back();
    }

    public function save_topbar_status($id){
        $topbarStatus = H_F_Wiget::find($id);
        if ($topbarStatus->topbarStatus == 1){
            $topbarStatus->topbarStatus = 0;
        }else{
            $topbarStatus->topbarStatus = 1;
        }
        $topbarStatus->save();
        return back();
    }


    public function save_advertisementtwo(Request $request){
        H_F_Wiget::saveAdvertisementTwo($request);
        return back();
    }

    public function save_advertisementtwo_status($id){
        $topbarStatus = H_F_Wiget::find($id);
        if ($topbarStatus->advertisementtwoStatus == 1){
            $topbarStatus->advertisementtwoStatus = 0;
        }else{
            $topbarStatus->advertisementtwoStatus = 1;
        }
        $topbarStatus->save();
        return back();
    }
}
