<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\User;

class UserMutation
{
	public function upgrade($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		if (auth()->user()->role == 'admin' || auth()->user()->id == 1)
		{
			$user = User::find($args['id']);
			switch($user->role)
			{
				case 'user':
					$user->role = 'subscriber';
					break;
				case 'subscriber':
					$user->role = 'admin';
					break;
			}
			$user->save();
		}

		return User::find($args['id']);
	}

	public function downgrade($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		if (auth()->user()->role == 'admin' || auth()->user()->id == 1)
		{
			$user = User::find($args['id']);
			switch($user->role)
			{
				case 'subscriber':
					$user->role = 'user';
					break;
				case 'admin':
					$user->role = 'subscriber';
					break;
			}
			$user->save();
		}

		return User::find($args['id']);
	}
}
