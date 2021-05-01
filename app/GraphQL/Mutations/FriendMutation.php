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
		$friend_id = auth()->user()->friend_request_all()->where('id', $args['id'])->first()->friend_id;

		// check conversation exists or create
		$conversations = auth()->user()->conversation_all(); 
		if ($conversations->contains('friend_id', '=', $friend_id))
			$conversations->where('friend_id', $friend_id)->first()->id;
		else
			auth()->user()->conversations()->create(['friend_id' => $friend_id])->id;

		return auth()->user()
		->friendrequests()
		->where('id', $args['id'])
		->first()
		->acceptFriendRequest();
	}

	public function delete($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		return auth()->user()
		->friends()
		->where('id', $args['id'])
		->delete();
	}
}
