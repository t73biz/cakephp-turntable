<?php
namespace Turntable\TestApp;

use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        $this->addPlugin('Turntable');
    }

  /**
   * Setup the middleware queue your application will use.
   *
   * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
   * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
   */
  public function middleware($middlewareQueue)
  {
    $middlewareQueue
      // Handle plugin/theme assets like CakePHP normally does.
      ->add(AssetMiddleware::class);

    return $middlewareQueue;
  }
}
