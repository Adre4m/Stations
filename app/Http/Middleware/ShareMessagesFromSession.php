<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ShareMessagesFromSession
{
    /**
     * The view factory implementation.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    /**
     * Create a new error binder instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If the current session has an "warnings" variable bound to it, we will share
        // its value with all view instances so the views can easily access warnings
        // without having to bind. An empty bag is set when there aren't warnings.
        $this->view->share(
            'messages', $request->session()->get('messages') ?: new ViewErrorBag
        );

        // Putting the warnings in the view for every view allows the developer to just
        // assume that some warnings are always available, which is convenient since
        // they don't have to continually run checks for the presence of warnings.

        return $next($request);
    }
}
