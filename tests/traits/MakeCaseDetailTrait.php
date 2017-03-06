<?php

use Faker\Factory as Faker;
use App\Models\CaseDetail;
use App\Repositories\CaseDetailRepository;

trait MakeCaseDetailTrait
{
    /**
     * Create fake instance of CaseDetail and save it in database
     *
     * @param array $caseDetailFields
     * @return CaseDetail
     */
    public function makeCaseDetail($caseDetailFields = [])
    {
        /** @var CaseDetailRepository $caseDetailRepo */
        $caseDetailRepo = App::make(CaseDetailRepository::class);
        $theme = $this->fakeCaseDetailData($caseDetailFields);
        return $caseDetailRepo->create($theme);
    }

    /**
     * Get fake instance of CaseDetail
     *
     * @param array $caseDetailFields
     * @return CaseDetail
     */
    public function fakeCaseDetail($caseDetailFields = [])
    {
        return new CaseDetail($this->fakeCaseDetailData($caseDetailFields));
    }

    /**
     * Get fake data of CaseDetail
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCaseDetailData($caseDetailFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Kase_id' => $fake->randomDigitNotNull,
            'foto_ktp' => $fake->word,
            'foto_stnk' => $fake->word,
            'foto_mobil' => $fake->word,
            'sisi1' => $fake->word,
            'sisi2' => $fake->word,
            'sisi3' => $fake->word,
            'sisi4' => $fake->word,
            'foto_dashboard' => $fake->word,
            'foto_sim' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $caseDetailFields);
    }
}
