<?php

namespace Service;

use App\Models\Content\Content;
use Carbon\Carbon;

class CheckService
{
    /**
     * 컨텐츠 정상 여부 확인
     */
    public function checkContentAvailable(Content $content): void
    {
        if ($content->parentData->isEmpty()) {
            abort(403, __('error.403.no_content'));
        }

        if ($content->open_status === 0 ||
            ! Carbon::now()->between($content->visible_started_at, $content->visible_ended_at)) {
            abort(403, __('error.403.content_expiration'));
        }
    }

    /**
     * 상대방 사주 or 내 사주로 보는것인지
     */
    public function isPartnerFortune(array $fortune, int $count): bool
    {
        $partner = false;

        if ($fortune['status'] === 1) {
            $partner = true;
        }
        if ($fortune['status'] === 2 && $count > 2) {
            $partner = true;
        }

        return $partner;
    }

    /**
     * 궁합 운세인지 확인
     */
    public function isPartnerDataUseContent(Content $content): bool
    {
        $isPartner = false;
        foreach ($content->childrenData as $data) {
            foreach ($data->contentFortunes as $fortune) {
                if ($fortune->status === 1 || $fortune->status === 2) {
                    $isPartner = true;
                    break 2;
                }
            }
        }

        return $isPartner;
    }
}
