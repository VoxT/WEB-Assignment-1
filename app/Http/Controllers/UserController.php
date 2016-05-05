<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use App\Admin;

use Auth;

use Hash;

use App\User;

class UserController extends Controller
{

    public function __construct(){}

    public function updateInfo(Request $requests) {
        $user = Auth::user();

        $messages = array(
            'required'    => 'Trường bắt buộc có.',
            'min'    => 'tối thiểu :min kí tự.',
            'string' => 'Tên phải là chữ.',
            'number' => 'Số điện thoại không được có chữ cái.'
        );

        $validator = Validator::make($requests->all(),[
            'name' => 'required|string|min:6',
            'number' => 'required|numeric|min:10',
            'diachi' => 'required|string|min:20'
         ], $messages);

        if ($validator->fails()) {
            return redirect('userinfo')
                        ->withErrors($validator)
                        ->withInput();
        }

        User::where('id', $user->id)->update([
                'name' => $requests->name,
                'sodienthoai' => $requests->number,
                'diachi' => $requests->diachi
            ]);

        return redirect('userinfo')->withErrors(['update_success' => 'Cập nhật thành công']);

    }

    public function updatePassword(Request $requests) {
        $user = Auth::user();

        $messages = array(
            'required'    => 'Trường bắt buộc có.',
            'min'    => 'tối thiểu :min kí tự.',
            'same' => 'Mật Khẩu không khớp'
        );

        $validator = Validator::make($requests->all(),[
            'old_password' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'password_confirmation' => 'required|same:newPassword|min:6'
         ], $messages);

        if ($validator->fails()) {
            return redirect('userinfo')
                        ->withErrors($validator)
                        ->withInput();
        }

        if (Hash::check($requests->old_password, $user->password)) {
                $user->fill([
                    'password' => Hash::make($requests->newPassword)
                ])->save();
                return redirect('userinfo')->withErrors(['success' => 'Mật khẩu đã được thay đổi!']);
        } else return redirect('userinfo')
                        ->withErrors(['old_password' => 'Sai mật khẩu']);
    }

}