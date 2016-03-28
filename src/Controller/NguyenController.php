<?php
namespace Drupal\nguyen\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\nguyen\NguyenServices\Injector;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactory;
class NguyenController extends ControllerBase {
  private $injector;
  private $loggerFactory;
  public function __construct(Injector $injector, LoggerChannelFactory $loggerFactory) {
    $this->injector = $injector;
    $this->loggerFactory = $loggerFactory;
  }
  public function inject($number) {
    $injectValue = $this->injector->injectNumber($number);
    $this->loggerFactory->get('default')->debug($injectValue);
    return new Response($injectValue);
  }
  public static function create( ContainerInterface $container) {
    $injector = $container->get('nguyen.injector');
    $loggerFactory = $container->get('logger.factory');
    return new static ($injector, $loggerFactory);
  }
}