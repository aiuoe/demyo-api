<?php

namespace App\GraphQL\Subscriptions;

use Illuminate\Http\Request;
use Nuwave\Lighthouse\Schema\Types\GraphQLSubscription;
use Nuwave\Lighthouse\Subscriptions\Subscriber;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class ConversationUpsert extends GraphQLSubscription
{
	/**
	 * Check if subscriber is allowed to listen to the subscription.
	 *
	 * @param  \Nuwave\Lighthouse\Subscriptions\Subscriber  $subscriber
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	public function authorize(Subscriber $subscriber, Request $request): bool
	{
		// TODO implement authorize
		return true;
	}

	/**
	 * Filter which subscribers should receive the subscription.
	 *
	 * @param  \Nuwave\Lighthouse\Subscriptions\Subscriber  $subscriber
	 * @param  mixed  $root
	 * @return bool
	 */
	public function filter(Subscriber $subscriber, $root): bool
	{
		// TODO implement filter
		if (auth()->user()->id == $subscriber->context->user->id && auth()->user()->id == $root->user_id)
			return true;
		else
			return false;
	}

  public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
  {
	return $root;
  }
}
