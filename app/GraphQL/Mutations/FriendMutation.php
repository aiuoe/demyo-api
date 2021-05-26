<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Nuwave\Lighthouse\Execution\Utils\Subscription;
use App\Models\Notification;
use App\Models\User;

class FriendMutation
{

	public function upsert($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): string
	{

		// exists relationship
		$friend = auth()->user()
		->friend_all()
		->contains('friend_id', $args['id']);
		
		if ($friend)
			return 'вы уже друзья';

		// already i send relationship
		$friend_send = auth()->user()
		->friendrequests()->get()
		->where('friend_id', $args['id'])
		->first();

		if ($friend_send != null)
			return 'вы уже отправили запрос';

		// have request
		$friend_request = auth()->user()
		->friendrequests()->get()
		->where('user_id', $args['id'])->first();
		
		if ($friend_request != null)
		{
			$friend_request->friend_request_accept();
			return 'вы теперь друзья';
		}
		
		// new request
		if ($friend_request == null && $friend == false)
		{
			$user = User::find($args['id']);
			$user_id = auth()->user()->id;
			$user_name = auth()->user()->name;
			$notification = Notification::create(
			[
				'friend_id' => $user_id, 
				'user_id' => $args['id'], 
				'message' => "$user_name хочет с тобой познакомиться"
			]);

			Subscription::broadcast('notificationSubscription', $notification->load('friend'));
			
			auth()->user()->friends()->create(['friend_id' => $args['id']]);
			
			return 'запрос о дружбе отправлен'; 
		}
	}

	public function delete($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): int
	{
		$friend = auth()->user()
		->friend_all()
		->where('friend_id', $args['id'])
		->first();
		if ($friend != null)
		{
			auth()->user()
			->conversation_all()
			->where('friend_id', $args['id'])
			->first()
			->delete();
			return $friend->delete();
		}
		else
			return 0;
	}
}
