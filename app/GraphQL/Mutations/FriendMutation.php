<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Nuwave\Lighthouse\Execution\Utils\Subscription;

class FriendMutation
{

	public function request($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		$friend = auth()->user()
		->friends()
		->create(['friend_id' => $args['friend_id']]);
		$friend->load('user');
		Subscription::broadcast('friendRequest', $friend);
		return $friend;
	}

	public function accept($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		return auth()->user()
		->friendrequests()
		->get()
		->where('id', $args['id'])
		->first()
		->friend_request_accept();
	}

	public function delete($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		return auth()->user()
		->friends()
		->where('id', $args['id'])
		->delete();
	}
}
