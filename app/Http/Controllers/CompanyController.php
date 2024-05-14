<?php

namespace App\Http\Controllers;


use App\Models\Candidate;
use App\Models\Company;
use App\Models\Career;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function showProfile(){
        // Lấy username từ session
        // $username = session('username');
        $username = 'def';

        // Lấy thông tin từ bảng Company với điều kiện cột 'name' bằng $username
        $companyInfo = Company::where('name', $username)->select('companyname', 'email', 'website', 'phone', 'address')->first();

        $candidatesInfo = Candidate::select('id','full_name','bio','job')->get();
        // //php
        // $companyInfo = [
        //     'companyname'=>' ',
        //     'email' => 'def@gmail.com'
        //  ]
        // echo tudien->email   
        // Kiểm tra xem dữ liệu có tồn tại không
        if($companyInfo and $candidatesInfo){
            // Trả về dữ liệu dưới dạng từ điển cho view
            return view('company.profile', ['companyInfo' => $companyInfo, 'candidatesInfor' => $candidatesInfo]);
        } else {
            // Nếu không tìm thấy thông tin của công ty, bạn có thể xử lý tùy thuộc vào yêu cầu của ứng dụng
            // Ví dụ: hiển thị thông báo hoặc chuyển hướng người dùng
            return redirect()->back()->with('error', 'Company information not found');
        }
    }

    public function showUpdate(){
        //show career infor to companyupdate page
        $careers = Career::all();

        return view('company.create',['careers' => $careers]);
    }

    public function createSubmit(Request $request){
        // Xác định dữ liệu cần cập nhật
        $dataToUpdate = [
            'companyname' => $request->input('companyname'),
            'website' => $request->input('website'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'career_id' => $request->input('career_id')
        ];
        // Thay đổi giá trị của cột name bằng giá trị từ session('username')
        // $username = session('username');
        $username = 'def';

        // Create a new company infor in the database
        try{
            // Cập nhật dữ liệu mới vào các cột có giá trị NULL
            Company::where('name', $username)->update($dataToUpdate);
            //Redirect with a success message
            return redirect()->route('com.update')->with('success', 'Company updated successfully');
        }catch (\Exception $e){
            //Redirect with a error message
            return redirect()->back()->with('error', 'Failed to update new information, please try again');
        }
    }

    public function searchsubmit(Request $request)
    {
        $key = $request->input('search');

        try {
            $username = 'def';

            // Lấy thông tin từ bảng Company với điều kiện cột 'name' bằng $username
            $companyInfo = Company::where('name', $username)->select('companyname', 'email', 'website', 'phone', 'address')->first();

            // Tìm kiếm trong các cột full_name, school, job, và address
            $candidatesInfor = Candidate::where('full_name', 'like', '%' . $key . '%')
                ->orWhere('school', 'like', '%' . $key . '%')
                ->orWhere('job', 'like', '%' . $key . '%')
                ->orWhere('address', 'like', '%' . $key . '%')
                ->select('full_name', 'job', 'bio')
                ->get();

            // Kiểm tra xem có kết quả hay không
            if ($candidatesInfor->isNotEmpty()) {
                // Trả về kết quả tìm kiếm cho view hoặc làm gì đó với kết quả này
                return view('company.profile', ['companyInfo' => $companyInfo, 'candidatesInfor' => $candidatesInfor]);
            } else {
                // Nếu không có kết quả nào, bạn có thể xử lý tùy thuộc vào yêu cầu của ứng dụng
                return redirect()->back()->with('message', 'No candidates found matching the search criteria.');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->back()->with('error', 'An error occurred while searching.');
        }
    }
}
