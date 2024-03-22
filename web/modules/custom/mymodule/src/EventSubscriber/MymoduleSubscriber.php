<?php declare(strict_types = 1);

namespace Drupal\mymodule\EventSubscriber;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @todo Add description for this subscriber.
 */
final class MymoduleSubscriber implements EventSubscriberInterface {

  protected LoggerChannelInterface $logger;

  /**
   * Constructs a MymoduleSubscriber object.
   */
  public function __construct(
    private readonly LoggerChannelFactoryInterface $loggerFactory,
  ) {
    $this->logger = $this->loggerFactory->get('mymodule');
  }

  /**
   * Kernel request event handler.
   */
  public function onKernelRequest(RequestEvent $event): void {
    // @todo Place your code here.
    $x = $event;
  }

  /**
   * Kernel response event handler.
   */
  public function onKernelResponse(ResponseEvent $event): void {
    // @todo Place your code here.
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      KernelEvents::REQUEST => ['onKernelRequest'],
      KernelEvents::RESPONSE => ['onKernelResponse'],
    ];
  }

}
