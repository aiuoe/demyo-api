<?php

namespace App\GraphQL\Directives;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
*@author Ruben
*/
class PaginateAuthDirective extends BaseDirective implements FieldResolver
{

  public static function definition(): string
  {
    return /** @lang GraphQL */ <<<'SDL'
    """
    Query multiple model entries as a paginated list.
    """
    directive @paginateAuth(
      """
      Specify the relation name of the model to use.
      """
      model: String

      """
      Limit the maximum amount of items that clients can request from paginated lists.
      Overrules the `pagination.max_count` setting from `lighthouse.php`.
      """
      max: Int
    ) on FIELD_DEFINITION
    SDL;
  }

  /**
   * Resolve the field directive.
   */
  public function resolveField(FieldValue $fieldValue): FieldValue
  {
    return $fieldValue
    ->setResolver(function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
      if ($this->nodeName() === 'friendrequests')
      {
        return auth()->user()->friend_request_all()
        ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));
      }

      if ($this->nodeName() === 'users')
        return auth()->user()->user_all();

      if ($this->nodeName() === 'messages')
        return auth()->user()->message_all();

      if ($this->nodeName() === 'conversations')
      {
        return auth()->user()->conversation_all()
        ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));
      }


      if ($this->nodeName() == 'friends')
      {
        return auth()->user()->friend_all()
        ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));
      }

      return auth()->user()->{$this->nodeName()}()->get()
      ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));        
    });
  }

}
