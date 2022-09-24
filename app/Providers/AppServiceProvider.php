<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Nuwave\Lighthouse\Exceptions\AuthorizationException;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Schema::defaultStringLength(191);

		Validator::extend('unfriend', function ($attribute, $value, $parameters, $validator)
		{
			if ($value)
			{
				$friends = auth()->user()
				->friends()
				->get()
				->transform(function ($item, $key)
				{ 
					if ($item->friend_id == auth()->user()->id)
					{
						$item->friend_id = $item->user_id; 
						$item->user_id = auth()->user()->id; 
					}
					return $item; 
				});

				$friend_requests = auth()->user()
				->friendrequests()
				->get()
				->transform(function ($item, $key)
				{ 
					if ($item->friend_id == auth()->user()->id)
					{
						$item->friend_id = $item->user_id; 
						$item->user_id = auth()->user()->id; 
					}
					return $item; 
				});

				if ($friends->contains('friend_id', '=', $value))
					throw new AuthorizationException("you already have his friendship");
				else if ($friend_requests->contains('friend_id', '=', $value))
					throw new AuthorizationException("you already have his friendship");
				else if (auth()->user()->id == $value)
					throw new AuthorizationException("you can't be your same friend");
				else
					return true; 
			}
		});

		Validator::extend('has', function ($attribute, $value, $parameters, $validator)
		{
			if ($value)
			{
				if (auth()->user()->{$parameters[0]}->contains($value))
					return true; 
				else
					throw new AuthorizationException("Unauthorized");
			}
		});

		Validator::extend('has_friend', function ($attribute, $value, $parameters, $validator)
		{
			if ($value)
			{
				logger($value);
				if (auth()->user()->friend_all()->contains('friend_id', $value))
					return true; 
				else
					throw new AuthorizationException("Unauthorized");
			}
		});

		Validator::extend('auth', function ($attribute, $value, $parameters, $validator)
		{
			if ($value)
			{
				if (auth()->user()->id == $value)
					return true; 
				else
					throw new AuthorizationException("Unauthorized");
			}
		});
	}
}
