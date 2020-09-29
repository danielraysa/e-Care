<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Notification;
use Auth;

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
        $notif = Notification::where('user_id', $user->id)->orderBy('created_at','desc')->get();
        $view->with('notification', $notif);
        $view->with('notif_count', $notif->count());
    }
}
