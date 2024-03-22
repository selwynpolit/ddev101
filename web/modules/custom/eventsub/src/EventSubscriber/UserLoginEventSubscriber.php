<?php

namespace Drupal\eventsub\EventSubscriber;

use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
//use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;

/**
 * Event subscriber for user login events.
 */
class UserLoginEventSubscriber implements EventSubscriberInterface {

  /**
   * The logger channel for watchdog logs.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  protected LoggerChannelInterface $logger;

  /**
   * Constructs a UserLoginEventSubscriber object.
   *
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   The logger factory service.
   */
  public function __construct(LoggerChannelFactoryInterface $logger_factory) {
    $this->logger = $logger_factory->get('eventsub');
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    // Subscribe to the custom user login event.
//    $events['eventsub_user_login'][] = ['onUserLogin', 1];
//    return $events;
    // Subscribe to the user login event.
//    $events[UserLoginEvent::EVENT_NAME][] = ['onUserLogin', 0];
    $events['user.login'][] = ['onUserLogin', 0];
    return $events;
  }

  /**
   * Callback method for the user login event.
   *
   * @param \Symfony\Component\HttpKernel\Event\ResponseEvent $event
   *   The event object.
   */
  public function onUserLogin(ResponseEvent $event) {
    // Log the user login event to the watchdog log.
    $this->logger->notice('Der User logged in.');
  }

}
