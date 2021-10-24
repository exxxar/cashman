<?php

namespace App\Http\Controllers\Cashback;

use App\Models\Notification;
use App\Notifications\RealTimeNotification;
use App\Http\Controllers\Controller;
use App\Models\HistoryUsersCompany;
use App\Models\User;
use App\Models\UsersFriedsByCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CashBackController extends Controller
{
    public function debitingCashback(Request $request)
    {
        $this->validate($request, [
            'user' => ['required', 'exists:users,id', 'exists:company_user,user_id'],
            'description' => ['required'],
            'sum' => ['required'],
            'cashback' => ['required']
        ]);
        if (!is_null($request->image)) {
            $request->description = $request->description . '. Прикрепленный документ доступен по ссылке - ' . $request->image;
        }

        $this->debitingMultiLevelCashback($request->user, $request->company, $request->admin, $request->cashback, $request->sum,
            $request->description, 'Начисление');
        $user = User::find($request->user);
        $user->notify(new RealTimeNotification('Начисление кэшбека - ' . $request->cashback . '$' . ',accrual',
            'От компании ' . $request->company['title'],
            'assets/sample/' . $request->company['image'], $user->device_token));
        $friends1 = UsersFriedsByCompany::where(['user_id' => $request->user, 'company_id' => $request->company['id']])->get();
        if ($friends1 != null) {
            $cashback_percent_level_1 = $request->company['cashback_percent_level_1'];
            $cashback_percent_level_2 = $request->company['cashback_percent_level_2'];
            if (!is_null($cashback_percent_level_1)) {
                foreach ($friends1 as $friend1) {
                    $cashback1 = $request->sum / 100 * $cashback_percent_level_1;
                    $this->debitingMultiLevelCashback($friend1->parent_id, $request->company, $request->admin, $cashback1, $request->sum,
                        'Начисление кэшбека 1 уровня от суммы чека вашего друга по компании', 'Начисление');
                    $user = User::find($friend1);
                    $user->notify(new RealTimeNotification('Начисление кэшбека 1 уровня - ' . $request->cashback . '$' . ',accrual',
                        'От компании ' . $request->company['title'],
                        'assets/sample/' . $request->company['image'], $user->device_token));
                    $friends2 = UsersFriedsByCompany::where(['user_id' => $friend1->parent_id, 'company_id' => $request->company['id']])->get();
                    if ($friends2 != null) {
                        if (!is_null($cashback_percent_level_2)) {
                            foreach ($friends2 as $friend2) {
                                $cashback2 = $request->sum / 100 * $cashback_percent_level_2;
                                $this->debitingMultiLevelCashback($friend2->parent_id, $request->company, $request->admin, $cashback2, $request->sum,
                                    'Начисление кэшбека 2 уровня от суммы чека вашего друга по компании', 'Начисление');
                                $user = User::find($friend2);
                                $user->notify(new RealTimeNotification('Начисление кэшбека 2 уровня - ' . $request->cashback . '$' . ',accrual',
                                    'От компании ' . $request->company['title'],
                                    'assets/sample/' . $request->company['image'], $user->device_token));
                            }
                        }
                    }
                }
            }
        }

    }

    public function offsCashback(Request $request)
    {
        $this->validate($request, [
            'user' => ['required', 'exists:users,id', 'exists:company_user,user_id'],
            'description' => ['required'],
            'sum' => ['required']
        ]);
        if (!is_null($request->image)) {
            $request->description = $request->description . '. Прикрепленный документ доступен по ссылке - ' . $request->image;
        }
        $score = HistoryUsersCompany::where(['user_id' => $request->user, 'company_id' => $request->company['id'], 'type' => 'Начисление'])->sum('value');
        if ($score < $request->sum) {
            return response()->json(['error' => 'Недостаточно средств для выполнения списания!']);
        }
        $this->debitingMultiLevelCashback($request->user, $request->company, $request->admin, $request->sum, $request->sum,
            $request->description, 'Списание');
        $user = User::find($request->user);
        $user->notify(new RealTimeNotification('Списание кэшбека - ' . $request->sum . '$' . ',offs',
            'Компанией ' . $request->company['title'],
            'assets/sample/' . $request->company['image'], $user->device_token));
    }

    public function debitingMultiLevelCashback($user, $company, $admin, $cashback, $sum, $description, $type)
    {
        HistoryUsersCompany::create([
            'user_id' => $user,
            'company_id' => $company['id'],
            'company_admin_id' => $admin,
            'value' => $cashback,
            'money_in_check' => $sum,
            'description' => $description,
            'type' => $type
        ]);
        Notification::create([
            'title' => $type . ' кэшбека - ' . $cashback . '$' . ' Компания - ' . $company['title'],
            'description' => $description,
            'user_id' => $user,
            'notification_type' => $type,
            'object_id' => $company['id'],
            'object_type' => 'company'
        ]);

    }

    public function loadDescriptionPhoto(Request $request)
    {
        $path = Storage::disk('public')->put('images/descriptions', $request->file);
        return response()->json(['file' => URL::to('/') . '/storage/' . $path]);
    }
}
