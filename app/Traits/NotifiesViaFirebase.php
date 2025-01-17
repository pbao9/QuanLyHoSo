<?php

namespace App\Traits;

use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\Notification\NotificationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Factory;


trait  NotifiesViaFirebase
{

    /**
     * Sends a Firebase notification to a list of device tokens or a topic.
     *
     * @param array $deviceTokens Array of device tokens to send notification to.
     * @param string|null $topic Topic to send notification to if specified.
     * @param string $title Title of the notification.
     * @param string $body Body text of the notification.
     */
    public function sendFirebaseNotification(array $deviceTokens, ?string $topic, string $title, string $body): void
    {
        $message = CloudMessage::new()->withNotification([
            'title' => $title,
            'body' => $body,
        ]);

        if ($topic) {
            $message = CloudMessage::withTarget('topic', $topic)
                ->withNotification([
                    'title' => $title,
                    'body' => $body,
                ]);
            $this->sendMessage($message);
        } else {
            foreach ($deviceTokens as $token) {
                $this->sendMessage($message->withChangedTarget('token', $token));
            }
        }
    }

    /**
     * Sends the message using Firebase messaging service.
     *
     * @param mixed $message The Firebase message object.
     */
    private function sendMessage(mixed $message): void
    {
        try {
            $factory = (new Factory)->withServiceAccount(base_path('firebase_credentials.json'));
            $messaging = $factory->createMessaging();
            $messaging->send($message);
            Log::info('Firebase notification sent successfully.');
        } catch (\Throwable $e) {
            Log::error('Failed to send Firebase notification', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
        }
    }


    /**
     * Registers a device token to a specific Firebase topic.
     *
     * @param string $deviceToken The device token to register.
     * @param string $topic The topic to subscribe to.
     * @return bool True if registration succeeded, false otherwise.
     */
    public function registerDeviceToTopic(string $deviceToken, string $topic): bool
    {
        $messaging = app('firebase.messaging');
        try {
            $messaging->subscribeToTopic($topic, [$deviceToken]);
            Log::info('Device registered to topic successfully.');
            return true;
        } catch (\Throwable $e) {
            Log::error('Failed to register device to topic', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Sends notifications to admins with a custom title and body.
     *
     * @param string $title Custom title of the notification.
     * @param string $body Custom body text of the notification.
     * @throws Exception
     */
    public function sendNotificationsToAdmins(string $title, string $body): void
    {
        $adminRepository = app(AdminRepositoryInterface::class);
        $admins = $adminRepository->getAll();
        $deviceTokens = $admins->pluck('device_token')->filter()->all();

        if (!empty($deviceTokens)) {
            $this->sendFirebaseNotification($deviceTokens, null, $title, $body);
        }
        foreach ($admins as $admin) {
            $this->notificationRepository->create([
                'admin_id' => $admin->id,
                'title' => $title,
                'message' => $body
            ]);
        }
    }


    public function sendFirebaseNotificationToParent($parent, string $title, string $body): void
    {
        $notificationRepository = app(NotificationRepositoryInterface::class);
        $deviceToken = $parent->user->device_token;
        if (!empty($deviceToken)) {
            $this->sendFirebaseNotification([$deviceToken], null, $title, $body);
        }
        $notificationRepository->create([
            'parent_id' => $parent->id,
            'title' => $title,
            'message' => $body
        ]);
    }
}
