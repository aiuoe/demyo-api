<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Nuwave\Lighthouse\Exceptions\AuthorizationException;
use App\Models\Conversation;
use App\Models\Message;

class MessageMutation
{
	public function upsert($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
	{
		// check relationships exists
		if (!auth()->user()->getFriends()->contains('friend_id', '=', $args['friend_id']))
			throw new AuthorizationException("to send him a message you must be his friend");

		// check conversation exists or create
		$conversations = auth()->user()->getConversations(); 
		if ($conversations->contains('friend_id', '=', $args['friend_id']))
			$conversation_id = $conversations->where('friend_id', $args['friend_id'])->first()->id;
		else
			$conversation_id = auth()->user()->conversations()->create(['friend_id' => $args['friend_id']])->id;

		// check message exists
		if (auth()->user()->messages->contains($args['id']))
			$message_id = $args['id'];
		else
			$message_id = 0;

		// upsert message
		return auth()->user()
		->messages()
		->updateOrCreate(
			['id' => $message_id],
			[
				'conversation_id' => $conversation_id, 
				'message' => $args['message']
			]);
	}
}
