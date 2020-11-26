<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Notification;
use Auth;
use App\User;

class NotificationComposer
{
    /**
     * The user repository implementation.
     *
     * @var Notification
     */
    protected $notif;

    /**
     * Create a new profile composer.
     *
     * @param  Notification  $users
     * @return void
     */
    public function __construct(Notification $notif)
    {
        // Dependencies automatically resolved by service container...
        $this->notification = $notif;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        $get_user = User::with('role_user')->find($user->id);
        $notif = Notification::where('user_id', $user->id)->orderBy('created_at','desc')->take(20)->get();
        $view->with('nama_role', $get_user->role_user->role_name);
        $view->with('notification', $notif);
        $view->with('notif_count', $notif->count());
    }
}
