<?php namespace Plenty\PlentyNotify;

use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;

class NotifyController
{
	const TYPE_SUCCESS  = 'success';
	const TYPE_ERROR    = 'error';
	const TYPE_WARNING  = 'warning';

	/**
	 * @var null
	 */
	protected $notifier = null;

	/**
	 * @var NotifyController
	 */
	private static $instance = null;

	/**
	 * @return NotifyController
	 */
	public static function getInstance()
	{
		if(!self::$instance instanceof NotifyController)
		{
			self::$instance = new NotifyController();
		}
		return self::$instance;
	}

	private function __construct()
	{
		$this->notifier = NotifierFactory::create();
	}

	private function __clone()
	{
	}

	/**
	 * Send notification
	 *
	 * @param string $title
	 * @param string $message
	 * @param string $type
	 */
	public function notify($title, $message, $type = self::TYPE_ERROR)
	{
		$iconType = in_array(strtolower($type), [self::TYPE_ERROR, self::TYPE_SUCCESS, self::TYPE_WARNING]) ? $type : self::TYPE_WARNING;

		$notification = new Notification();
		$notification
			->setTitle($title)
			->setBody($message)
			->setIcon(PUBLIC_PATH . '/images/' . strtolower($iconType) . '.png');

		$this->notifier->send($notification);
	}
}
