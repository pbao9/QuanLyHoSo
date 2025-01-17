@extends('admin.layouts.master')
<style>
				.notification-item {
								display: flex;
								align-items: center;
								justify-content: space-between;
								background-color: #fff;
								padding: 15px;
								margin-bottom: 10px;
								border-radius: 8px;
								box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
								transition: transform 0.2s ease, box-shadow 0.2s ease;
				}

				.notification-item.notification-unread {
								border-left: 5px solid #ff9800;
								/* Màu cam */
				}

				.notification-item.notification-read {
								border-left: 5px solid #4caf50;
								/* Màu xanh */
				}

				.notification-item:hover {
								transform: translateY(-2px);
								box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
				}

				.notification-title {
								font-size: 16px;
								font-weight: bold;
								color: #333;
								margin-bottom: 5px;
				}

				.notification-message {
								font-size: 14px;
								color: #666;
				}

				.notification-status {
								font-size: 12px;
								font-weight: bold;
				}

				.notification-status.status-unread {
								color: #ff9800;
								/* Màu cam cho trạng thái chưa đọc */
				}

				.notification-status.status-read {
								color: #4caf50;
								/* Màu xanh cho trạng thái đã đọc */
				}

				.notification-time {
								font-size: 12px;
								color: #aaa;
				}
</style>

@section('content')
				<div class="page-header d-print-none">
								<div class="container-xl">
												<div class="row g-2 align-items-center">
																<div class="col">
																				<h2 class="page-title">
																								{{ __('Dashboard') }}
																				</h2>
																</div>
												</div>
								</div>
				</div>

				<div class="page-body">
								<div class="notifications-container me-3 ms-3">
												@forelse ($notifications as $notification)
																<div
																				class="notification-item {{ $notification->status == App\Enums\Notification\NotificationStatus::NOT_READ ? 'notification-unread' : 'notification-read' }}">
																				<div>
																								<div class="notification-title">{{ $notification->title }}</div>
																								<div class="notification-message">{{ $notification->message }}</div>
																				</div>
																				<div>
																								<div
																												class="notification-status {{ $notification->status == App\Enums\Notification\NotificationStatus::NOT_READ ? 'status-unread' : 'status-read' }}">
																												{{ $notification->status == App\Enums\Notification\NotificationStatus::NOT_READ ? 'Chưa đọc' : 'Đã đọc' }}
																								</div>
																								<div class="notification-time">
																												{{ $notification->created_at->format('H:i d/m/Y') }}
																								</div>
																				</div>
																</div>
												@empty
																<p>Không có thông báo nào.</p>
												@endforelse
								</div>
				</div>
@endsection
