<?php

namespace App\GraphQL\Subscriptions;

use Illuminate\Http\Request;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Subscriptions\Subscriber;
use Nuwave\Lighthouse\Schema\Types\GraphQLSubscription;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UserUpdated extends GraphQLSubscription
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
		return true;
	}

  public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
  {
		return $root;
  }
}
