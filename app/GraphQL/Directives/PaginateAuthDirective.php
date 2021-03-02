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
      if ($this->nodeName() == 'conversations' || $this->nodeName() == 'friends' || $this->nodeName() == 'friendrequests')
      {
        return auth()->user()
        ->{$this->nodeName()}()
        ->get()
        ->transform(function ($item, $key) 
          { 
            if($item->friend_id == auth()->user()->id) 
            { 
              $item->friend_id = $item->user_id; 
              $item->user_id = auth()->user()->id; 
            } 

            return $item;  
          })
        ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));
      }

      return auth()->user()->{$this->nodeName()}()->get()
      ->forPage($args['page'], $this->directiveArgValue('max') 
        ?? config('lighthouse.pagination.default_count'));        
    });
  }

}
