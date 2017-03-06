<?php

use Faker\Factory as Faker;
use App\Models\Kase;
use App\Repositories\KaseRepository;

trait MakeKaseTrait
{
    /**
     * Create fake instance of Kase and save it in database
     *
     * @param array $kaseFields
     * @return Kase
     */
    public function makeKase($kaseFields = [])
    {
        /** @var KaseRepository $kaseRepo */
        $kaseRepo = App::make(KaseRepository::class);
        $theme = $this->fakeKaseData($kaseFields);
        return $kaseRepo->create($theme);
    }

    /**
     * Get fake instance of Kase
     *
     * @param array $kaseFields
     * @return Kase
     */
    public function fakeKase($kaseFields = [])
    {
        return new Kase($this->fakeKaseData($kaseFields));
    }

    /**
     * Get fake data of Kase
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKaseData($kaseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tanggal_case' => $fake->word,
            'no_polisi' => $fake->word,
            'no_mesin' => $fake->word,
            'no_rangka' => $fake->word,
            'merek_id' => $fake->randomDigitNotNull,
            'tahun_anggaran' => $fake->word,
            'warna' => $fake->word,
            'status' => $fake->word,
            'agent_id' => $fake->randomDigitNotNull,
            'wilayah_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kaseFields);
    }
}
