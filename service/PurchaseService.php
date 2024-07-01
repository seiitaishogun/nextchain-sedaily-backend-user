<?php

namespace Service;

use App\Models\Content\Content;
use App\Models\Payment\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Service\Fortune\ConstellationService;
use Service\Fortune\SibijisinService;

class PurchaseService
{
    /**
     * @todo 개선 필요
     */
    public function initPurchaseData(Request $request, Content $content, User $user): array
    {
        $personalData = $request->data[0] ?? null;

        return [
            'ip' => $request->getClientIp(),
            'content_id' => $content->id,
            'user_id' => $user->id ?? null,
            'name' => $personalData['name'] ?? $user->name,
            'gender' => $personalData['gender'] ?? $user->gender,
            'marital' => $personalData['marital'] ?? $user->marital,
            'birthed_at' => $personalData['birthed_at'] ?? $user->birthed_at,
            'is_birthed_time' => $personalData['is_birthed_time'] ?? $user->is_birthed_time,
            'calendar' => $personalData['calendar'] ?? $user->calendar,
            'value' => $personalData['value'] ?? null,
            'survey_value' => $request->survey_value ?? null,
        ];
    }

    /**
     * @todo 개선 필요
     */
    public function initPurchaseDataByGuest(Request $request, Content $content): array
    {
        $personalData = $request->data[0] ?? null;

        return [
            'content_id' => $content->id,
            'name' => $personalData['name'] ?? '비회원',
            'gender' => $personalData['gender'] ?? '0',
            'marital' => $personalData['marital'] ?? 'single',
            'birthed_at' => $personalData['birthed_at'] ?? Carbon::parse()->format('Y-m-d H:i:s'),
            'is_birthed_time' => $personalData['is_birthed_time'] ?? '0',
            'calendar' => $personalData['calendar'] ?? 'solar',
            'value' => $personalData['value'] ?? null,
        ];
    }

    public function getSelectedValue(string $contentValue, string $birthedAt, ?string $selectedValue): int|string|null
    {
        return match ($contentValue) {
            'zodiac' => (new SibijisinService())->getSibijisin($birthedAt),
            'constellation' => (new ConstellationService())->getConstellation($birthedAt),
            default => $selectedValue ?? null,
        };
    }

    /**
     * 상대방(궁합) 개인 정보 저장
     */
    public function storePartner(array $personalData, int $contentId, int $purchaseId): void
    {
        Purchase::create([
            'parent_id' => $purchaseId,
            'content_id' => $contentId,
            'name' => $personalData['name'],
            'gender' => $personalData['gender'],
            'marital' => $personalData['marital'],
            'birthed_at' => $personalData['birthed_at'],
            'calendar' => $personalData['calendar'],
            'value' => $personalData['value'] ?? null,
        ]);
    }

    /**
     * 컨텐츠 가격 확인
     */
    public function getContentPrice(Content $content): int
    {
        // 컨텐츠 가격 확인
        if (Carbon::now()->between($content->discount_started_at, $content->discount_ended_at)) {
            $price = $content->discount_price;
        } else {
            $price = $content->price;
        }

        return $price;
    }

    /**
     * 유저가 최초 무료 사용 가능 확인
     */
    public function canFirstFree(int $contentId, int $userId): bool
    {
        return ! Purchase::where(['content_id' => $contentId, 'user_id' => $userId])->exists();
    }

    /**
     * 기다리는 시간 확인
     */
    public function getWaitTime(Content $content, int $userId): string
    {
        $waitTime = '00:00:00';
        $freePurchasedAt = Purchase::where(['content_id' => $content->id, 'user_id' => $userId])
            ->whereIn('method', ['wait', 'first'])
            ->latest()
            ->value('created_at');

        if ($freePurchasedAt) {
            $availableAt = $freePurchasedAt->addHours($content->wait_free_time);
            if (now() < $availableAt) {
                $waitTime = Carbon::now()->diff($availableAt)->format('%h:%i:%s');
            }
        }

        return $waitTime;
    }
}
