<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FriendMutation
{

	public function request($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		return auth()->user()
		->friends()
		->create(['friend_id' => $args['friend_id']])->id;
	}

	public function accept($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
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
